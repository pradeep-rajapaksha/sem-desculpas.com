const recordAudio = () =>
  new Promise(async resolve => {
    const stream = await navigator.mediaDevices.getUserMedia({ audio: true });
    const mediaRecorder = new MediaRecorder(stream);
    const audioChunks = [];

    mediaRecorder.addEventListener("dataavailable", event => {
      audioChunks.push(event.data);
    });

    const start = () => mediaRecorder.start();

    const stop = () =>
      new Promise(resolve => {
        mediaRecorder.addEventListener("stop", () => {
          const audioBlob = new Blob(audioChunks, {"type": "audio/webm; codecs=opus"});
          console.log('audioBlob >>> ', audioBlob);
          const audioUrl = URL.createObjectURL(audioBlob);
          const audio = new Audio(audioUrl);
            const myStream = mediaRecorder.stream;
            console.log(myStream);
          const play = () => audio.play();
          resolve({ audioBlob, audioUrl, play });
        });

        if(mediaRecorder.state !== "inactive") {
          mediaRecorder.stop();
        }
      });

    // const pause = () => mediaRecorder.pause();
    const pause = () =>
      new Promise(resolve => {
        if(mediaRecorder.state === "recording") {
          mediaRecorder.pause();
        }
        resolve();
      });

    // const resume = () => mediaRecorder.resume();
    const resume = () =>
      new Promise(resolve => {
        if(mediaRecorder.state === "paused") {
          mediaRecorder.resume();
        }
        resolve();
      });

    resolve({ start, stop, pause, resume });
  });

const sleep = time => new Promise(resolve => setTimeout(resolve, time));

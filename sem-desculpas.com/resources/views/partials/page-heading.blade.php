                        <div class="row">
                            <div class="col-xl-7">
                                <h2> {{$title}}</h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        @foreach ($breadcrumb as $element)
                                            @if (isset($element['link']) && !empty($element['link']))
                                                <li class="breadcrumb-item"><a href="{{ $element['link'] }}">{{ $element['label'] }}</a></li>
                                            @elseif(end($breadcrumb) === $element)
                                                <li class="breadcrumb-item active" aria-current="page">{{ $element['label'] }}</li>
                                            @endif
                                        @endforeach
                                    </ol>
                                </nav>
                            </div>

                            <div class="col-xl-5">
                                <div class="btn-grp">
                                    @foreach($buttons as $button)
                                        <a href="{{ $button['link'] }}" class="{{ $button['classes'] }}"><img src="{{ $button['icon'] }}"> {{ $button['label'] }}</a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
@php
    function getRandomColor()
    {
        $letters = '0123456789ABCDEF';
        $color = '#';
        for ($i = 0; $i < 6; $i = $i + 1) {
            $color .= $letters[rand(0, 15)];
        }
        return $color;
    }
@endphp

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <link rel="stylesheet" href="./assets/css/public_profile.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" />
</head>

<body>
    <div class="public-view">
        <main class="rectangle-parent">
            <div class="frame-child"></div>
            <section class="rectangle-group">
                <img class="frame-item" alt="" src="./assets/images/profile-images/bg-cover.png" />

                <div class="row">
                    <div class="wrapper-ellipse-48">
                        <img class="wrapper-ellipse-48-child" loading="lazy" alt=""
                            src="./assets/images/profile-images/user.jpg" />
                    </div>


                </div>


            </section>
            <section class="frame-parent">
                <div class="frame-group">
                    <div class="john-wrapper">
                        <h3 class="john">{{ $user->name }}</h3>
                    </div>
                    <div class="frame-wrapper">
                        <div class="artist-parent">
                            <div class="artist">{{ $user->designation }}</div>
                            <div class="frame-container">
                                <div class="jonasyahoocom-parent">
                                    <div class="jonasyahoocom">{{ $user->email }}</div>
                                    <div class="age">{{ $user->age }} Age</div>
                                    <div class="california">{{ $user->address }}</div>
                                </div>
                                <button class="rectangle-container">
                                    <div class="frame-inner"></div>
                                    <div class="tablerplus-wrapper">
                                        <img class="tablerplus-icon" alt=""
                                            src="./assets/images/profile-images/tabler_plus.png" />
                                    </div>
                                    <div class="connect">Connect</div>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="frame-div">
                        <div class="rectangle-parent1">
                            <div class="rectangle-div"></div>
                            <div class="as-a-musician">
                                {{ $user->description }}
                            </div>
                        </div>
                    </div>
                    <div class="design-wrapper">
                        <div class="design">
                            @foreach ($tags as $tag)
                                @php
                                    $randomColor = getRandomColor();
                                @endphp
                                <button class="frame-button" style="background-color: {{ $randomColor }};">
                                    <div class="frame-child1"></div>
                                    <div class="pop">{{ $tag->name }}</div>
                                </button>
                            @endforeach

                        </div>
                    </div>
                </div>
                <div class="frame-parent1">
                    <div>
                        <div class="videos">Videos</div>
                    </div>
                    <div class="videos-wrapper">
                        <div class="videos-section">
                            <div class="video-row">
                                <div>
                                    <video class="video" controls>
                                        <source src="./assets/videos/bg-video.mp4" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>

                                </div>

                                <div>
                                    <video class="video" controls>
                                        <source src="./assets/videos/bg-video.mp4" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>

                                </div>
                            </div>

                            <div class="video-row">
                                <div>
                                    <video class="video" controls>
                                        <source src="./assets/videos/bg-video.mp4" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>

                                </div>

                                <div>
                                    <video class="video" controls>
                                        <source src="./assets/videos/bg-video.mp4" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>

                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="frame-parent5">
                    <div class="audio-wrapper">
                        <div class="audio">Audio</div>
                    </div>
                    <div class="rectangle-parent15">
                        <div class="frame-child18"></div>
                        <div class="rectangle-parent16">
                            <div class="frame-child19"></div>
                            <div class="name-jazzzy">Name: Jazzzy</div>
                            <div class="row">
                                <audio controls class="audio">
                                    <source
                                        src="https://interactive-examples.mdn.mozilla.net/media/cc0-audio/t-rex-roar.mp3"
                                        type="audio/mpeg">
                                    <source
                                        src="https://interactive-examples.mdn.mozilla.net/media/cc0-audio/t-rex-roar.ogg"
                                        type="audio/ogg">
                                    <source
                                        src="https://interactive-examples.mdn.mozilla.net/media/cc0-audio/t-rex-roar.wav"
                                        type="audio/wav">
                                    Audio not supported
                                </audio>
                            </div>
                        </div>
                        <div class="rectangle-parent16">
                            <div class="frame-child19"></div>
                            <div class="name-jazzzy">Name: Jazzzy</div>
                            <div class="row">
                                <audio controls class="audio">
                                    <source
                                        src="https://interactive-examples.mdn.mozilla.net/media/cc0-audio/t-rex-roar.mp3"
                                        type="audio/mpeg">
                                    <source
                                        src="https://interactive-examples.mdn.mozilla.net/media/cc0-audio/t-rex-roar.ogg"
                                        type="audio/ogg">
                                    <source
                                        src="https://interactive-examples.mdn.mozilla.net/media/cc0-audio/t-rex-roar.wav"
                                        type="audio/wav">
                                    Audio not supported
                                </audio>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
        </main>
    </div>

    <script>
        document.querySelectorAll('.menu-toggle').forEach(button => {
            button.addEventListener('click', function() {
                const menu = this.nextElementSibling;
                menu.classList.toggle('show');
            });
        });
    </script>
</body>

</html>

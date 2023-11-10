<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>myPOV-comment</title>

    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js" defer></script>

    <link href="{{ asset('style/comments/css/app.css') }}" rel="stylesheet" />
    <script src="{{ asset('style/comments/js/app.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

</head>

<body>
    @yield('content')
    <script>
        $(document).ready(function() {
            ClassicEditor
                .create(document.querySelector('#comment'), {
                    toolbar: {
                        items: [
                            'bold',
                            "|",
                            'italic',
                            '|',
                            'numberedList',
                            'bulletedList',
                            '|',
                            'link',
                            '|',
                            'undo',
                            'redo',
                            '|',
                        ]
                    }
                })
                .catch(error => {
                    console.error(error);
                });
        });
    </script>
</body>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CKEditor 5 - Quick start ZIP</title>
        <link rel="stylesheet" href="../../assets/vendor/ckeditor5.css">
        <style>
            .main-container {
                width: 795px;
                margin-left: auto;
                margin-right: auto;
            }
        </style>
    </head>
    <body>

        <div class="main-container">
            <div id="editor">
                <p>Hello from CKEditor 5!</p>
            </div>
        </div>
        <script type="importmap">
            {
                "imports": {
                    "ckeditor5": "../../../assets/vendor/ckeditor5.js",
                    "ckeditor5/": "../../assets/vendor/"
                }
            }
        </script>
        <script type="module">
            import {
                ClassicEditor,
                Essentials,
                Paragraph,
                Bold,
                Italic,
                Font
            } from 'ckeditor5';

            ClassicEditor
                .create( document.querySelector( '#editor' ), {
                    licenseKey: 'GPL',
                    plugins: [ Essentials, Paragraph, Bold, Italic, Font ],
                    toolbar: [
                        'undo', 'redo', '|', 'bold', 'italic', '|',
                        'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
                    ]
                } )
                .then( editor => {
                    window.editor = editor;
                } )
                .catch( error => {
                    console.error( error );
                } );
        </script>



    </body>

</html>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Thêm Ảnh</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <!-- Jquery -->
    {{--//<script type="text/javascript" src="js/jquery.isotope.min.js"></script>--}}
    <script type="text/javascript" src="js/jquery.js"></script>

</head>
<body>
<span id="previewImg"></span> <!-- span hứng images chọn từ fle -->
<input class="hinh" type="image" src="upload/user/medelab.png" width="100px"/> <!-- ảnh để chọn file -->
<input style="display: none" type='file' id="files" name="image" multiple="multiple" />

<!-- sự kiện click into images -->
<script type="text/javascript">
    $(document).ready(function(){
        $("input[type='image']").click(function() {
            $("input[id='files']").click();
        });
    });
</script>
<!-- hàm chọn ảnh -->
<script type="text/javascript" >
    function handleFileSelect(evt) {
        var files = evt.target.files; // FileList object

        // Loop through the FileList and render image files as thumbnails.
        for (var i = 0, f; f = files[i]; i++) {
            // Only process image files.
            if (!f.type.match('image.*')) {
                continue;
            }
            var reader = new FileReader(); //biến hiện images ra
            // Closure to capture the file information.
            reader.onload = (function (theFile) {
                return function (e) {
                    // render thumbnail.
                    var span = document.createElement('span');
                    span.innerHTML = ['<img class="thumb" src="', e.target.result,'" title="', escape(theFile.name), '"/>' ,'<i class="fa fa-times time " ></i>'].join('');
                    document.getElementById('previewImg').insertBefore(span, null); //chèn images vào span dựng sẵn có ID previewImg

                };
            })
            (f);
            // Read in the image file as a data URL.
            reader.readAsDataURL(f);
        }
    }
    document.getElementById('files').addEventListener('change', handleFileSelect, false);
</script>
<!-- hàm xóa ảnh -->
<script type="text/javascript">
    $(document).on('click',".time" ,function() {
        if(confirm("Bạn Có Muốn Xóa ?"))
        {
            $(this).closest("span" ).fadeOut();
            $("#files").val(null); //xóa tên của file trong input
        }
        else
            return false;
    });
</script>
<!-- có thể dùng hàm closest().remover(),parent().remove(),fadeOut(),fadeToggle()
//$(document).on('click',".time" ,function() {
//$(this).parent().remove();
//});
-->
</body>
</html>
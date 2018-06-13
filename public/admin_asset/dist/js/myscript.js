$(document).ready(function () {
   $("#addImages").click(function () {
       $("#insert").append(' <div class="col-md-3"><p><img src="upload/user/medelab.png" class="img-fix" for="4"  id="image_4" type="file" alt=""><input type="file" id="files4" class="_n files" for="4" name="arrayImg[]" ></p> </div>') });
});

// $(document).ready(function () {
//     $("#file").onchange(function () {
//         var img=$(this).
//
//     })
//
// });
//     document.getElementById("files").onchange = function () {
//         var reader = new FileReader();
//         //var stt =$(this).attr('for');
//         reader.onload = function (e) {
//             document.getElementById("image").src = e.target.result;
//         };
//         reader.readAsDataURL(this.files[0]);
//         //alert(reader);
//     };
    document.getElementById("files0").onchange = function () {
        var reader = new FileReader();
        var stt =$(this).attr('for');
        var span = document.createElement('span');
        reader.onload = function (e) {
            document.getElementById("image_"+stt).src = e.target.result;
            span.innerHTML=['<i class="fa fa-times time_0 " for ="'+stt+'"></i>'].join('');
            document.getElementById("previewImg_"+stt).insertBefore(span, null); //chèn images vào span dựng sẵn có ID previewImg
        };
        reader.readAsDataURL(this.files[0]);
    };
    document.getElementById("files1").onchange = function () {
        var reader = new FileReader();
        var stt =$(this).attr('for');
        var span = document.createElement('span');
        reader.onload = function (e) {
            document.getElementById("image_"+stt).src = e.target.result;
            span.innerHTML=['<i class="fa fa-times time_0 " for ="'+stt+'"></i>'].join('');
            document.getElementById("previewImg_"+stt).insertBefore(span, null); //chèn images vào span dựng sẵn có ID previewImg
        };
        reader.readAsDataURL(this.files[0]);
    };
    document.getElementById("files2").onchange = function () {
        var reader = new FileReader();
        var stt =$(this).attr('for');
        var span = document.createElement('span');
        reader.onload = function (e) {
            document.getElementById("image_"+stt).src = e.target.result;
            span.innerHTML=['<i class="fa fa-times time_0 " for ="'+stt+'"></i>'].join('');
            document.getElementById("previewImg_"+stt).insertBefore(span, null); //chèn images vào span dựng sẵn có ID previewImg
        };
        reader.readAsDataURL(this.files[0]);
    };
    document.getElementById("files3").onchange = function () {
        var reader = new FileReader();
        var stt =$(this).attr('for');
        var span = document.createElement('span');
        reader.onload = function (e) {
            document.getElementById("image_"+stt).src = e.target.result;
            span.innerHTML=['<i class="fa fa-times time_0 " for ="'+stt+'"></i>'].join('');
            document.getElementById("previewImg_"+stt).insertBefore(span, null); //chèn images vào span dựng sẵn có ID previewImg
        };
        reader.readAsDataURL(this.files[0]);
    };
    document.getElementById("files4").onchange = function () {
        var reader = new FileReader();
        var stt =$(this).attr('for');
        var span = document.createElement('span');
        reader.onload = function (e) {
            document.getElementById("image_"+stt).src = e.target.result;
            span.innerHTML=['<i class="fa fa-times time_'+stt+' " for ="'+stt+'"></i>'].join('');
            document.getElementById("previewImg_"+stt).insertBefore(span, null); //chèn images vào span dựng sẵn có ID previewImg
        };
        reader.readAsDataURL(this.files[0]);
    };




//<script type="text/javascript">
    $(document).ready(function(){
        $("input[type='image']").click(function() {
            $("input[id='files']").click();
        });
    });
// </script>
// <!-- hàm chọn ảnh -->
// <script type="text/javascript" >
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

// <!-- hàm xóa ảnh -->
// <script type="text/javascript">
    $(document).on('click',".time" ,function() {
        if(confirm("Bạn Có Muốn Xóa ?"))
        {
            $(this).closest("span" ).fadeOut();
            $("#files").val(null); //xóa tên của file trong input
        }
        else
            return false;
    });
// </script>
// <!-- có thể dùng hàm closest().remover(),parent().remove(),fadeOut(),fadeToggle()
// //$(document).on('click',".time" ,function() {
// //$(this).parent().remove();
// //});
// -->
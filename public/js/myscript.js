$(document).ready(function () {
    $("#txtKhoa").change(function () {
        var idKhoa =$(this).val();
        alert(idKhoa);
//                $.get("/ajax/chuyenkhoa/"+idKhoa,function(data){
//                      alert(data);
//                    //$("#txtBacSy").html(data);
        //});
    });
});
document.getElementById('button').onclick =function () {
    alert('oke');

};
(function ($) {
    function changeImg(input) {
        //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            //Sự kiện file đã được load vào website
            reader.onload = function (e) {
                //Thay đổi đường dẫn ảnh
                $('.form-group.image .thumbnail').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    function load_image() {
        var src_img = $(".form-group.image .src_img")
        $(src_img).change(function () {
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                //Sự kiện file đã được load vào website
                reader.onload = function (e) {
                    //Thay đổi đường dẫn ảnh
                    $('.form-group.image .thumbnail').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
                console.log(this.files);
            }
        })

    }

    $(document).ready(function () {
        load_image();

    })
})(jQuery);

$(document).ready(function () {

    $(".confirmDelete").click(function () {
        var record = $(this).attr('record');
        var recordid = $(this).attr('recordid');
        Swal.fire({
            title: 'Are you sure ?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonText: 'Cancel',
            cancelButtonColor: "#d33",
            confirmButtonText: 'Ok',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                window.location.href = "/admin/" + record + "/delete/" + recordid;
            }
        });
    });

});

function sortByField(field) {
    let type_inner = '';
    let params = new URLSearchParams(location.search);
    let currentType = params.get('sort_type');
    // if (currentType === 'asc') {
    //     type_inner = 'desc';
    // }else {
    //     type_inner = 'asc';
    // }
    type_inner=currentType == 'asc' ? 'desc':'asc'
    params.set('sort_field', field);
    params.set('sort_type', type_inner);
    location.search = params.toString();
    console.log(params.toString());
}

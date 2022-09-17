(function( $ ){
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
    function load_image(){
        var src_img = $(".form-group.image .src_img")
        $(src_img).change(function(){
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                //Sự kiện file đã được load vào website
                reader.onload = function (e) {
                    //Thay đổi đường dẫn ảnh
                    $('.form-group.image .thumbnail').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            }
        })

    }

    $(document).ready(function(){
        load_image();
    })
})( jQuery );

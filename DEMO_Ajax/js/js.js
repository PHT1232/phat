// gọi sự kiện onclick trên thẻ a sử dụng
//onload trong javascript tương đương với document.ready trong jquery
$(document).ready(function() {
    $('#show-ajax').click(function () {
       //gọi ajax đến sever để yêu cầu lấy danh sách sinh viên
       var obj_ajax = {
         url: 'get_list.php',
         method: 'POST',
         data: {
             name: 'Mạnh' //demo 1 tham số gửi lên
         },
         success: function (result) {
             //xử lí hiển thị result tại vị trí mong muốn
             // console.log(result);
             //biến result là biến lấy dữ liệu trả về từ sever
             $('#result-ajax').html(result);
         }
       };

       //gọi ajax
        $.ajax(obj_ajax);
    });
});
$(function () {
    // Lấy trạng thái menu 'active' từ localStorage khi tải lại trang
    const activeMenu = localStorage.getItem('activeMenu');
    
    // Nếu có giá trị 'activeMenu' trong localStorage, tìm và kích hoạt menu tương ứng
    if (activeMenu) {
        $('.get_active').removeClass('active'); // Xóa tất cả các class 'active' khỏi menu
        // Tìm thẻ <a> có href trùng với giá trị trong 'activeMenu', sau đó thêm class 'active' vào <li> cha
        $(`.get_active a[href="${activeMenu}"]`).parent().addClass('active');
    }

    // Lắng nghe sự kiện click trên các thẻ <a> trong các thẻ <li> có class 'get_active'
    $(document).on('click', '.get_active > a', function (e) {
        
        // Xóa class 'active' khỏi tất cả các thẻ <li>
        // $('.get_active').removeClass('active');
        
        // Thêm class 'active' vào <li> chứa thẻ <a> mà người dùng vừa click
        $(this).parent().addClass('active');
        
        // Lưu đường dẫn (href) của thẻ <a> vào localStorage để khôi phục sau khi tải lại trang
        const href = $(this).attr('href');
        localStorage.setItem('activeMenu', href); // Lưu href vào localStorage
    });
});
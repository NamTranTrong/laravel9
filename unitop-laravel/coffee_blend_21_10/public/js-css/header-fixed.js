window.addEventListener("scroll", function () {
    const menu = document.querySelector('.nav-item');
    const menuOffset = menu.offsetTop; // Vị trí của menu so với top của trang
    const scrollPosition = window.scrollY; // Vị trí hiện tại của scroll
  
    // Kiểm tra xem scroll đã đi qua vị trí của menu chưa
    if (scrollPosition > menuOffset) {
      menu.classList.add('fixed'); // Gắn lớp 'fixed' khi scroll qua menu
    } else {
      menu.classList.remove('fixed'); // Loại bỏ lớp 'fixed' khi quay lại vị trí ban đầu
    }
  });

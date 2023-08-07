document.addEventListener('DOMContentLoaded', function () {
    const longDataCells = document.querySelectorAll('td.long-data');

    longDataCells.forEach(function (cell) {
        const content = cell.querySelector('.product-content');
        const toggleButton = document.createElement('span');
        toggleButton.textContent = 'Xem thêm';
        toggleButton.classList.add('toggle-button');

        // Xử lý sự kiện click vào nút "Xem thêm"
        toggleButton.addEventListener('click', function () {
            content.classList.toggle('collapsed');
            toggleButton.textContent = content.classList.contains('collapsed') ? 'Rút gọn' : 'Xem thêm';
            if (!content.classList.contains('collapsed')) {
                const target = cell.querySelector('#collapse-target');
                target.focus();
            }
        });

        cell.appendChild(toggleButton);
    });
});
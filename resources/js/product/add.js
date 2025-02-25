function confirmDelete() {
    return new Promise((resolve, reject) => {
        Sweet.fire({
            title: "Bạn có chắc chắn muốn xóa?",
            text: "Hành động này không thể hoàn tác!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Xóa",
            cancelButtonText: "Hủy"
        }).then((result) => {
            if (result.isConfirmed) {
                resolve(true);
            } else {
                reject(false);
            }
        });
    });
}

$(document).on('click', '.btn-delete', function (e) {
    e.preventDefault();
    let id = $(this).data('id'); // Lấy ID từ data-id
    confirmDelete()
        .then(() => {
            $(`#form-delete${id}`).submit();
        })
        .catch((err) => {
            console.log('Hủy xóa', err); // Thêm xử lý nếu cần
        });
});

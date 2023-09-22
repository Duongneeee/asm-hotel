window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

    const tableList = document.querySelector('#datatable');
    const deleteForm = document.querySelector('.delete-form');
    const formall = document.querySelector('.form-all');
    

    tableList.addEventListener('click', (e) => {
        if (e.target.classList.contains("delete-action")) {
            e.preventDefault();
            Swal.fire({
                title: 'Bạn có chắc chắn?',
                text: "Nếu xóa bạn không thể khôi phục",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ok, Đồng ý xóa!'
            }).then((result) => {
                if (result.isConfirmed) {
                    const action = e.target.href;
                    deleteForm.action = action;
                    deleteForm.submit();
                }
            })

        }

        if (e.target.classList.contains("delete-all")) {
            e.preventDefault();
            Swal.fire({
                title: 'Bạn có chắc chắn?',
                text: "Mục này sẽ bị chuyển vào thùng rác!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Swal.fire(
                    //     'Deleted!',
                    //     'Your file has been deleted.',
                    //     'success'
                    // )
                    formall.submit();
                }
            })
        }
    })

});
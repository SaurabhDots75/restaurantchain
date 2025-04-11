
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script> --}}
<script src="{{asset('/admin')}}/js/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="{{asset('/admin')}}/js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="{{asset('/admin')}}/assets/demo/chart-area-demo.js"></script>
<script src="{{asset('/admin')}}/assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
<script src="{{asset('/admin')}}/js/datatables-simple-demo.js"></script>
<script src="{{asset('/admin')}}/js/selecttwo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>

{{-- Fancybox JS --}}
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.sweet-delete').forEach(function(button) {
            button.addEventListener('click', function () {
                const url = this.dataset.url;
                const token = this.dataset.token;

                Swal.fire({
                    title: 'Are you sure?',
                    text: "This action cannot be undone!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch(url, {
                            method: 'get',
                            headers: {
                                'X-CSRF-TOKEN': token,
                                'Accept': 'application/json',
                                'Content-Type': 'application/json'
                            }
                        })
                        .then(response => {
                            if (response.ok) {
                                Swal.fire('Deleted!', 'Item has been deleted.', 'success')
                                    .then(() => location.reload());
                            } else {
                                Swal.fire('Error', 'Something went wrong!', 'error');
                            }
                        })
                        .catch(() => {
                            Swal.fire('Error', 'Request failed.', 'error');
                        });
                    }
                });
            });
        });
    });
</script>

// function readURL(input) {
//     if (input.files && input.files[0]) {
//         var reader = new FileReader();

//         reader.onload = function (e) {

//             $('#blah').attr('src', e.target.result);
//             alert($("#employee_name").val());
//             console.log($("#employee_name").val())
//             //$('#blah')
//             // .attr('src', e.target.result);
//         };

//         reader.readAsDataURL(input.files[0]);
//     }
// }

// function changeName() {
//     $("#employee_name").on('change', function () {
//         var quantity = $("#employee_name").val();
//         //var discount=$("#discount").val();
//         if (quantity != "") {
//             alert("Abc")
//         }

//     });
// }

const flashData = $('.flash-data').data('flashdata');

if (flashData) {
    Swal.fire({
        title: 'Gate Pass Data ',
        text :'added successfully' + flashData,
        type :'success'
    });
}

$('.tombol-hapus').on('click', function (e) {
    e.preventDefault();
    const href = $(this).attr('action');

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.value) {
            document.location.href = href;
        //   Swal.fire(
        //     'Deleted!',
        //     'Your file has been deleted.',
        //     'success'
        //   )
        }
      })
});

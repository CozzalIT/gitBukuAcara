$('.hapus').click(function(){

	swal({
		title:'KONFIRMASI',
		text :'Apakah anda yakin manghapus data ',
		icon : 'warning',
		buttons: true,
		dangerMode: true,
	})
	.then((willDelete) => {
		if(willDelete){
			window.location = this.href;
		}
	});
	return false;

})

$('.delete').click(function(){
		swal({
		  title: 'Are you sure?',
		  text: "You won't be able to revert this!",
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
		  if (result.value) {
				if(result){
					window.location = this.href;
				}
		    swal(
		      'Deleted!',
		      'Your file has been deleted.',
		      'success'
		    )
		  }
		});
		return false;
})

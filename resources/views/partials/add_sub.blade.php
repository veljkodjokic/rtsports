<script type="text/javascript">
  async function add_sub(user)
  {
    var inputOptions = new Promise((resolve) => {
  setTimeout(() => {
    resolve({
      '0': 'Trial',
      '1': 'Monthly',
      '2': 'Season pass'
    })
  })
})

const {value: type} = await swal({
  title: 'Select subscription type for',
  text:' '+user,
  input: 'radio',
  inputOptions: inputOptions,
  inputValidator: (value) => {
    return !value && 'You need to choose something!'
  }
})

if (type) {
  $.post('/admin/add_sub', {_type: type,_user: user}, function(response) {
    swal('Subscription added successfuly','','success');
})
}
  }

  function rem_sub(user)
  {
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
    swal(
      'Deleted!',
      ' ',
      'success'
    );
    $.post('/admin/rem_sub', {_user: user});
    }
  })
}
</script>
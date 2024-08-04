window.addEventListener('notify', event => {
    swal({
        title: 'Congratulations!',
        icon: 'success',
        button: 'OK',
        text: event.detail.message
    })
})

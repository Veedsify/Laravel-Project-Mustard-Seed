window.addEventListener('notify', event => {
    swal({
        title: 'Congratulations!',
        icon: 'success',
        button: 'OK',
        text: event.detail.message
    })
})


window.addEventListener('notify-error', event => {
    swal({
        title: 'Sorry an error occured!',
        icon: 'error',
        button: 'OK',
        text: event.detail.message
    })
})

window.addEventListener('notify-info', event => {
    swal({
        title: 'Sorry this action is denied!',
        icon: 'info',
        button: 'OK',
        text: event.detail.message
    })
})

window.addEventListener('notify-id', event => {
    swal({
        title: 'Please verify your identity!',
        icon: 'info',
        button: 'OK',
        text: event.detail.message
    })
})


//Main Script Files for the application


import './bootstrap';

// import Alpine from 'alpinejs';

// window.Alpine = Alpine;

// Alpine.start();


Echo.private("new-request").listen(
    ".request-created",
    function (event) {
        alert(event.user+ " request new " +event.type);
    }
);

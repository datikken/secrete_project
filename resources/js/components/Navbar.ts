import axios from 'axios';

export default class Navbar {
    constructor() {
        this.add_listener();
    }

    add_listener() {
        let that = this;

        let logoutbtn = document.querySelector('[data-logout]');
        logoutbtn && logoutbtn.addEventListener("click", (e: Event) => {
            that.logout_handler();
        })
    }

    async logout_handler() {
        await axios({
            method: 'post',
            url: '/logout',
        })
            .then(() => window.location = '/')

    }
}

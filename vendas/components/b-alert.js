// CREATE A CLASS FOR THE ELEMENT
class BAlert extends HTMLElement {
    constructor() {
        // ALWAYS CALL SUPER FIRST IN CONSTRUCTOR
        super();

        // CREATE DIV ELEMENT
        const wrapper = document.createElement('div');
        wrapper.setAttribute('class', 'alert alert-danger');
        wrapper.setAttribute('role', 'alert');
        wrapper.setAttribute('style', 'position: absolute; top: 3%; right: 3%;');

        // CREATE SPAN ELEMENT
        const info = wrapper.appendChild(document.createElement('span'));

        // TAKE ATTRIBUTE CONTENT AND PUT IT INSIDE THE INFO SPAN
        info.textContent = this.getAttribute('alert-text');

        // ATTACH THE CREATED ELEMENT TO THE DOM
        document.body.appendChild(wrapper);

        // FUNCTION THAT OPEN AND CLOSE ALERT WITH JQUERY
        $(document).ready(v => {
            $('.alert').alert();
            
            setInterval(v => {
                $('.alert').alert('close')
            }, 3000);
        });
    }
}

// DEFINE THE NEW ELEMENT
customElements.define('b-alert', BAlert);

/*
    <div class="alert alert-danger" role="alert" style="position: absolute; top: 3%; right: 3%;">
        <span>E-mail or password is incorrect.</span>
    </div>
    
    <b-alert alert-text="E-mail or password is incorrect."></b-alert>
*/

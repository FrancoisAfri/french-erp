<style>
    /* hr with centered text */
    hr.hr-text {
        line-height: 1em;
        position: relative;
        outline: 0;
        border: 0;
        color: black;
        text-align: center;
        height: 1.5em;
        opacity: .5;
    }
    hr.hr-text::before {
        content: '';
        /* use the linear-gradient for the fading effect
        // use a solid background color for a solid bar */
        background: linear-gradient(to right, transparent, #818078, transparent);
        position: absolute;
        left: 0;
        top: 50%;
        width: 100%;
        height: 1px;
    }
    hr.hr-text::after {
        content: attr(data-content);
        position: relative;
        display: inline-block;
        color: black;

        padding: 0 .5em;
        line-height: 1.5em;
        /* this is really the only tricky part, you need to specify the background color of the container element...*/
        color: #818078;
        background-color: #fcfcfa;
    }
</style>
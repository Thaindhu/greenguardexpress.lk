<style>
    /* .snow {
        position: absolute;
        width: 120vw;
        height: 100vh;
        left: -10vw;
        z-index: 9;
    }

    .snowflake {
        position: fixed;
        top: -5vmin;
    } */

    .snowflake:nth-child(1) {
        opacity: 0.67;
        font-size: 9px;
        left: 17.9vw;
        animation: fall-1 40s -33s ease-in infinite;
    }

    .snowflake:nth-child(1) span {
        animation: spin 3s linear 0s infinite;
        filter: drop-shadow(0 0 1px #368BC1);
    }

    @keyframes fall-1 {
        5.6666666667% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 113.6vw;
        }
    }

    .snowflake:nth-child(2) {
        opacity: 0.32;
        font-size: 9px;
        left: 37.2vw;
        animation: fall-2 50s -13.5s ease-in infinite;
    }

    .snowflake:nth-child(2) span {
        animation: spin 9s linear 0s infinite;
        filter: drop-shadow(0 0 5px #368BC1);
    }

    @keyframes fall-2 {
        1.5% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 61.7vw;
        }
    }

    .snowflake:nth-child(3) {
        opacity: 0.21;
        font-size: 15px;
        left: 100.1vw;
        animation: fall-3 20s -28.5s ease-in infinite;
    }

    .snowflake:nth-child(3) span {
        animation: spin 12s linear 0s infinite;
        filter: drop-shadow(0 0 3px #368BC1);
    }

    @keyframes fall-3 {
        6.3333333333% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 18vw;
        }
    }

    .snowflake:nth-child(4) {
        opacity: 0.85;
        font-size: 9px;
        left: 62.5vw;
        animation: fall-4 10s -4.5s ease-in infinite;
    }

    .snowflake:nth-child(4) span {
        animation: spin 15s linear 0s infinite;
        filter: drop-shadow(0 0 1px #368BC1);
    }

    @keyframes fall-4 {
        6.6666666667% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 84.3vw;
        }
    }

    .snowflake:nth-child(5) {
        opacity: 0.55;
        font-size: 9px;
        left: 113.8vw;
        animation: fall-5 50s -24s ease-in infinite;
    }

    .snowflake:nth-child(5) span {
        animation: spin 12s linear 0s infinite;
        filter: drop-shadow(0 0 2px #368BC1);
    }

    @keyframes fall-5 {
        0.5% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 119.2vw;
        }
    }

    .snowflake:nth-child(6) {
        opacity: 0.62;
        font-size: 3px;
        left: 2.2vw;
        animation: fall-6 30s -16.5s ease-in infinite;
    }

    .snowflake:nth-child(6) span {
        animation: spin 9s linear 0s infinite;
        filter: drop-shadow(0 0 1px #368BC1);
    }

    @keyframes fall-6 {
        7.6666666667% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 89.7vw;
        }
    }

    .snowflake:nth-child(7) {
        opacity: 0.85;
        font-size: 9px;
        left: 12.9vw;
        animation: fall-7 30s -9s ease-in infinite;
    }

    .snowflake:nth-child(7) span {
        animation: spin 6s linear 0s infinite;
        filter: drop-shadow(0 0 3px #368BC1);
    }

    @keyframes fall-7 {
        2.8333333333% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 106.2vw;
        }
    }

    .snowflake:nth-child(8) {
        opacity: 0.09;
        font-size: 12px;
        left: 103.5vw;
        animation: fall-8 10s -16.5s ease-in infinite;
    }

    .snowflake:nth-child(8) span {
        animation: spin 12s linear 0s infinite;
        filter: drop-shadow(0 0 2px #368BC1);
    }

    @keyframes fall-8 {
        0.8333333333% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 37.8vw;
        }
    }

    .snowflake:nth-child(9) {
        opacity: 0.77;
        font-size: 15px;
        left: 116vw;
        animation: fall-9 40s -34.5s ease-in infinite;
    }

    .snowflake:nth-child(9) span {
        animation: spin 3s linear 0s infinite;
        filter: drop-shadow(0 0 1px #368BC1);
    }

    @keyframes fall-9 {
        5.3333333333% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 16.9vw;
        }
    }

    .snowflake:nth-child(10) {
        opacity: 0.49;
        font-size: 15px;
        left: 86vw;
        animation: fall-10 20s -27s ease-in infinite;
    }

    .snowflake:nth-child(10) span {
        animation: spin 9s linear 0s infinite;
        filter: drop-shadow(0 0 5px #368BC1);
    }

    @keyframes fall-10 {
        4.1666666667% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 34.3vw;
        }
    }

    .snowflake:nth-child(11) {
        opacity: 0.57;
        font-size: 6px;
        left: 8.3vw;
        animation: fall-11 30s -12s ease-in infinite;
    }

    .snowflake:nth-child(11) span {
        animation: spin 3s linear 0s infinite;
        filter: drop-shadow(0 0 5px #368BC1);
    }

    @keyframes fall-11 {
        3.3333333333% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 16.7vw;
        }
    }

    .snowflake:nth-child(12) {
        opacity: 0.6;
        font-size: 6px;
        left: 43.9vw;
        animation: fall-12 20s -25.5s ease-in infinite;
    }

    .snowflake:nth-child(12) span {
        animation: spin 3s linear 0s infinite;
        filter: drop-shadow(0 0 5px #368BC1);
    }

    @keyframes fall-12 {
        5% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 112.4vw;
        }
    }

    .snowflake:nth-child(13) {
        opacity: 0.48;
        font-size: 6px;
        left: 54.7vw;
        animation: fall-13 40s -12s ease-in infinite;
    }

    .snowflake:nth-child(13) span {
        animation: spin 3s linear 0s infinite;
        filter: drop-shadow(0 0 4px #368BC1);
    }

    @keyframes fall-13 {
        7.8333333333% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 33.4vw;
        }
    }

    .snowflake:nth-child(14) {
        opacity: 0.12;
        font-size: 9px;
        left: 110.5vw;
        animation: fall-14 30s -1.5s ease-in infinite;
    }

    .snowflake:nth-child(14) span {
        animation: spin 6s linear 0s infinite;
        filter: drop-shadow(0 0 2px #368BC1);
    }

    @keyframes fall-14 {
        1.5% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 89.9vw;
        }
    }

    .snowflake:nth-child(15) {
        opacity: 0.4;
        font-size: 12px;
        left: 2.5vw;
        animation: fall-15 20s -34.5s ease-in infinite;
    }

    .snowflake:nth-child(15) span {
        animation: spin 12s linear 0s infinite;
        filter: drop-shadow(0 0 2px #368BC1);
    }

    @keyframes fall-15 {
        4.5% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 4.4vw;
        }
    }

    .snowflake:nth-child(16) {
        opacity: 0.45;
        font-size: 12px;
        left: 24.1vw;
        animation: fall-16 20s -12s ease-in infinite;
    }

    .snowflake:nth-child(16) span {
        animation: spin 12s linear 0s infinite;
        filter: drop-shadow(0 0 5px #368BC1);
    }

    @keyframes fall-16 {
        2.3333333333% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 25.9vw;
        }
    }

    .snowflake:nth-child(17) {
        opacity: 0.26;
        font-size: 9px;
        left: 96.9vw;
        animation: fall-17 10s -19.5s ease-in infinite;
    }

    .snowflake:nth-child(17) span {
        animation: spin 6s linear 0s infinite;
        filter: drop-shadow(0 0 3px #368BC1);
    }

    @keyframes fall-17 {
        2.3333333333% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 104.7vw;
        }
    }

    .snowflake:nth-child(18) {
        opacity: 0.11;
        font-size: 15px;
        left: 99.2vw;
        animation: fall-18 40s -30s ease-in infinite;
    }

    .snowflake:nth-child(18) span {
        animation: spin 6s linear 0s infinite;
        filter: drop-shadow(0 0 3px #368BC1);
    }

    @keyframes fall-18 {
        7.5% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 102.1vw;
        }
    }

    .snowflake:nth-child(19) {
        opacity: 0.32;
        font-size: 3px;
        left: 92.5vw;
        animation: fall-19 40s -33s ease-in infinite;
    }

    .snowflake:nth-child(19) span {
        animation: spin 12s linear 0s infinite;
        filter: drop-shadow(0 0 1px #368BC1);
    }

    @keyframes fall-19 {
        6.8333333333% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 28.1vw;
        }
    }

    .snowflake:nth-child(20) {
        opacity: 0.76;
        font-size: 12px;
        left: 61.9vw;
        animation: fall-20 10s -19.5s ease-in infinite;
    }

    .snowflake:nth-child(20) span {
        animation: spin 12s linear 0s infinite;
        filter: drop-shadow(0 0 3px #368BC1);
    }

    @keyframes fall-20 {
        1% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 69.2vw;
        }
    }

    .snowflake:nth-child(21) {
        opacity: 0.69;
        font-size: 15px;
        left: 110.3vw;
        animation: fall-21 10s -22.5s ease-in infinite;
    }

    .snowflake:nth-child(21) span {
        animation: spin 12s linear 0s infinite;
        filter: drop-shadow(0 0 1px #368BC1);
    }

    @keyframes fall-21 {
        1% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 39.4vw;
        }
    }

    .snowflake:nth-child(22) {
        opacity: 0.49;
        font-size: 6px;
        left: 107.1vw;
        animation: fall-22 20s -18s ease-in infinite;
    }

    .snowflake:nth-child(22) span {
        animation: spin 9s linear 0s infinite;
        filter: drop-shadow(0 0 3px #368BC1);
    }

    @keyframes fall-22 {
        4% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 88.1vw;
        }
    }

    .snowflake:nth-child(23) {
        opacity: 0.83;
        font-size: 15px;
        left: 5.3vw;
        animation: fall-23 30s -1.5s ease-in infinite;
    }

    .snowflake:nth-child(23) span {
        animation: spin 3s linear 0s infinite;
        filter: drop-shadow(0 0 2px #368BC1);
    }

    @keyframes fall-23 {
        0.8333333333% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 44.5vw;
        }
    }

    .snowflake:nth-child(24) {
        opacity: 0.2;
        font-size: 9px;
        left: 2.8vw;
        animation: fall-24 40s -7.5s ease-in infinite;
    }

    .snowflake:nth-child(24) span {
        animation: spin 12s linear 0s infinite;
        filter: drop-shadow(0 0 2px #368BC1);
    }

    @keyframes fall-24 {
        5.1666666667% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 89.9vw;
        }
    }

    .snowflake:nth-child(25) {
        opacity: 0.15;
        font-size: 9px;
        left: 87.9vw;
        animation: fall-25 40s -30s ease-in infinite;
    }

    .snowflake:nth-child(25) span {
        animation: spin 12s linear 0s infinite;
        filter: drop-shadow(0 0 3px #368BC1);
    }

    @keyframes fall-25 {
        2.1666666667% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 87.8vw;
        }
    }

    .snowflake:nth-child(26) {
        opacity: 0.26;
        font-size: 6px;
        left: 40.3vw;
        animation: fall-26 50s -16.5s ease-in infinite;
    }

    .snowflake:nth-child(26) span {
        animation: spin 6s linear 0s infinite;
        filter: drop-shadow(0 0 4px #368BC1);
    }

    @keyframes fall-26 {
        0.6666666667% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 108.4vw;
        }
    }

    .snowflake:nth-child(27) {
        opacity: 0.45;
        font-size: 3px;
        left: 64.6vw;
        animation: fall-27 40s -28.5s ease-in infinite;
    }

    .snowflake:nth-child(27) span {
        animation: spin 15s linear 0s infinite;
        filter: drop-shadow(0 0 1px #368BC1);
    }

    @keyframes fall-27 {
        2.5% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 88.7vw;
        }
    }

    .snowflake:nth-child(28) {
        opacity: 0.05;
        font-size: 3px;
        left: 120vw;
        animation: fall-28 20s -34.5s ease-in infinite;
    }

    .snowflake:nth-child(28) span {
        animation: spin 15s linear 0s infinite;
        filter: drop-shadow(0 0 3px #368BC1);
    }

    @keyframes fall-28 {
        5.5% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 78.1vw;
        }
    }

    .snowflake:nth-child(29) {
        opacity: 0.57;
        font-size: 12px;
        left: 99.3vw;
        animation: fall-29 30s -33s ease-in infinite;
    }

    .snowflake:nth-child(29) span {
        animation: spin 3s linear 0s infinite;
        filter: drop-shadow(0 0 5px #368BC1);
    }

    @keyframes fall-29 {
        3.6666666667% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 118.1vw;
        }
    }

    .snowflake:nth-child(30) {
        opacity: 0.26;
        font-size: 3px;
        left: 15.1vw;
        animation: fall-30 30s -34.5s ease-in infinite;
    }

    .snowflake:nth-child(30) span {
        animation: spin 12s linear 0s infinite;
        filter: drop-shadow(0 0 5px #368BC1);
    }

    @keyframes fall-30 {
        6% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 14.1vw;
        }
    }

    .snowflake:nth-child(31) {
        opacity: 0.76;
        font-size: 12px;
        left: 74.7vw;
        animation: fall-31 50s -1.5s ease-in infinite;
    }

    .snowflake:nth-child(31) span {
        animation: spin 6s linear 0s infinite;
        filter: drop-shadow(0 0 5px #368BC1);
    }

    @keyframes fall-31 {
        3.6666666667% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 15.1vw;
        }
    }

    .snowflake:nth-child(32) {
        opacity: 0.88;
        font-size: 12px;
        left: 92.2vw;
        animation: fall-32 50s -18s ease-in infinite;
    }

    .snowflake:nth-child(32) span {
        animation: spin 3s linear 0s infinite;
        filter: drop-shadow(0 0 1px #368BC1);
    }

    @keyframes fall-32 {
        1.3333333333% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 93.3vw;
        }
    }

    .snowflake:nth-child(33) {
        opacity: 0.83;
        font-size: 12px;
        left: 119.9vw;
        animation: fall-33 40s -12s ease-in infinite;
    }

    .snowflake:nth-child(33) span {
        animation: spin 15s linear 0s infinite;
        filter: drop-shadow(0 0 3px #368BC1);
    }

    @keyframes fall-33 {
        6.3333333333% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 70.1vw;
        }
    }

    .snowflake:nth-child(34) {
        opacity: 0.56;
        font-size: 12px;
        left: 84vw;
        animation: fall-34 50s -13.5s ease-in infinite;
    }

    .snowflake:nth-child(34) span {
        animation: spin 3s linear 0s infinite;
        filter: drop-shadow(0 0 4px #368BC1);
    }

    @keyframes fall-34 {
        7.1666666667% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 65vw;
        }
    }

    .snowflake:nth-child(35) {
        opacity: 0.78;
        font-size: 15px;
        left: 70.3vw;
        animation: fall-35 40s -15s ease-in infinite;
    }

    .snowflake:nth-child(35) span {
        animation: spin 12s linear 0s infinite;
        filter: drop-shadow(0 0 3px #368BC1);
    }

    @keyframes fall-35 {
        7.1666666667% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 97vw;
        }
    }

    .snowflake:nth-child(36) {
        opacity: 0.32;
        font-size: 12px;
        left: 0.6vw;
        animation: fall-36 40s -28.5s ease-in infinite;
    }

    .snowflake:nth-child(36) span {
        animation: spin 15s linear 0s infinite;
        filter: drop-shadow(0 0 4px #368BC1);
    }

    @keyframes fall-36 {
        3.5% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 37.7vw;
        }
    }

    .snowflake:nth-child(37) {
        opacity: 0.48;
        font-size: 12px;
        left: 67.4vw;
        animation: fall-37 40s -27s ease-in infinite;
    }

    .snowflake:nth-child(37) span {
        animation: spin 9s linear 0s infinite;
        filter: drop-shadow(0 0 4px #368BC1);
    }

    @keyframes fall-37 {
        3.3333333333% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 2.3vw;
        }
    }

    .snowflake:nth-child(38) {
        opacity: 0.39;
        font-size: 12px;
        left: 53.3vw;
        animation: fall-38 10s -28.5s ease-in infinite;
    }

    .snowflake:nth-child(38) span {
        animation: spin 3s linear 0s infinite;
        filter: drop-shadow(0 0 2px #368BC1);
    }

    @keyframes fall-38 {
        3.1666666667% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 31.5vw;
        }
    }

    .snowflake:nth-child(39) {
        opacity: 0.14;
        font-size: 3px;
        left: 101.6vw;
        animation: fall-39 20s -33s ease-in infinite;
    }

    .snowflake:nth-child(39) span {
        animation: spin 6s linear 0s infinite;
        filter: drop-shadow(0 0 3px #368BC1);
    }

    @keyframes fall-39 {
        3.8333333333% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 55.7vw;
        }
    }

    .snowflake:nth-child(40) {
        opacity: 0.05;
        font-size: 15px;
        left: 15.9vw;
        animation: fall-40 30s -16.5s ease-in infinite;
    }

    .snowflake:nth-child(40) span {
        animation: spin 9s linear 0s infinite;
        filter: drop-shadow(0 0 4px #368BC1);
    }

    @keyframes fall-40 {
        7% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 41.6vw;
        }
    }

    .snowflake:nth-child(41) {
        opacity: 0.06;
        font-size: 3px;
        left: 73.7vw;
        animation: fall-41 20s -30s ease-in infinite;
    }

    .snowflake:nth-child(41) span {
        animation: spin 15s linear 0s infinite;
        filter: drop-shadow(0 0 1px #368BC1);
    }

    @keyframes fall-41 {
        8.1666666667% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 105.3vw;
        }
    }

    .snowflake:nth-child(42) {
        opacity: 0.27;
        font-size: 6px;
        left: 116.6vw;
        animation: fall-42 30s -19.5s ease-in infinite;
    }

    .snowflake:nth-child(42) span {
        animation: spin 9s linear 0s infinite;
        filter: drop-shadow(0 0 3px #368BC1);
    }

    @keyframes fall-42 {
        2.5% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 23.2vw;
        }
    }

    .snowflake:nth-child(43) {
        opacity: 0.58;
        font-size: 6px;
        left: 22.7vw;
        animation: fall-43 30s -25.5s ease-in infinite;
    }

    .snowflake:nth-child(43) span {
        animation: spin 12s linear 0s infinite;
        filter: drop-shadow(0 0 2px #368BC1);
    }

    @keyframes fall-43 {
        2% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 80.6vw;
        }
    }

    .snowflake:nth-child(44) {
        opacity: 0.37;
        font-size: 12px;
        left: 75vw;
        animation: fall-44 50s -34.5s ease-in infinite;
    }

    .snowflake:nth-child(44) span {
        animation: spin 15s linear 0s infinite;
        filter: drop-shadow(0 0 5px #368BC1);
    }

    @keyframes fall-44 {
        2.8333333333% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 56.6vw;
        }
    }

    .snowflake:nth-child(45) {
        opacity: 0.79;
        font-size: 12px;
        left: 98.7vw;
        animation: fall-45 50s -12s ease-in infinite;
    }

    .snowflake:nth-child(45) span {
        animation: spin 12s linear 0s infinite;
        filter: drop-shadow(0 0 5px #368BC1);
    }

    @keyframes fall-45 {
        7.1666666667% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 118vw;
        }
    }

    .snowflake:nth-child(46) {
        opacity: 0.09;
        font-size: 9px;
        left: 80.4vw;
        animation: fall-46 20s -15s ease-in infinite;
    }

    .snowflake:nth-child(46) span {
        animation: spin 3s linear 0s infinite;
        filter: drop-shadow(0 0 2px #368BC1);
    }

    @keyframes fall-46 {
        6.5% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 35.1vw;
        }
    }

    .snowflake:nth-child(47) {
        opacity: 0.31;
        font-size: 15px;
        left: 115.1vw;
        animation: fall-47 30s -21s ease-in infinite;
    }

    .snowflake:nth-child(47) span {
        animation: spin 15s linear 0s infinite;
        filter: drop-shadow(0 0 1px #368BC1);
    }

    @keyframes fall-47 {
        1.3333333333% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 45.3vw;
        }
    }

    .snowflake:nth-child(48) {
        opacity: 0.71;
        font-size: 3px;
        left: 2.5vw;
        animation: fall-48 30s -7.5s ease-in infinite;
    }

    .snowflake:nth-child(48) span {
        animation: spin 3s linear 0s infinite;
        filter: drop-shadow(0 0 4px #368BC1);
    }

    @keyframes fall-48 {
        7% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 6.7vw;
        }
    }

    .snowflake:nth-child(49) {
        opacity: 0.1;
        font-size: 12px;
        left: 1.1vw;
        animation: fall-49 30s -1.5s ease-in infinite;
    }

    .snowflake:nth-child(49) span {
        animation: spin 9s linear 0s infinite;
        filter: drop-shadow(0 0 2px #368BC1);
    }

    @keyframes fall-49 {
        3.3333333333% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 4.9vw;
        }
    }

    .snowflake:nth-child(50) {
        opacity: 0.56;
        font-size: 9px;
        left: 89.2vw;
        animation: fall-50 50s -33s ease-in infinite;
    }

    .snowflake:nth-child(50) span {
        animation: spin 9s linear 0s infinite;
        filter: drop-shadow(0 0 3px #368BC1);
    }

    @keyframes fall-50 {
        7% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 42vw;
        }
    }

    .snowflake:nth-child(51) {
        opacity: 0.33;
        font-size: 12px;
        left: 40.6vw;
        animation: fall-51 30s -10.5s ease-in infinite;
    }

    .snowflake:nth-child(51) span {
        animation: spin 9s linear 0s infinite;
        filter: drop-shadow(0 0 2px #368BC1);
    }

    @keyframes fall-51 {
        1.6666666667% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 51.8vw;
        }
    }

    .snowflake:nth-child(52) {
        opacity: 0.31;
        font-size: 12px;
        left: 76.3vw;
        animation: fall-52 50s -19.5s ease-in infinite;
    }

    .snowflake:nth-child(52) span {
        animation: spin 9s linear 0s infinite;
        filter: drop-shadow(0 0 3px #368BC1);
    }

    @keyframes fall-52 {
        0.6666666667% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 57vw;
        }
    }

    .snowflake:nth-child(53) {
        opacity: 0.73;
        font-size: 6px;
        left: 104.1vw;
        animation: fall-53 40s -10.5s ease-in infinite;
    }

    .snowflake:nth-child(53) span {
        animation: spin 12s linear 0s infinite;
        filter: drop-shadow(0 0 5px #368BC1);
    }

    @keyframes fall-53 {
        3.8333333333% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 119.2vw;
        }
    }

    .snowflake:nth-child(54) {
        opacity: 0.01;
        font-size: 6px;
        left: 39.1vw;
        animation: fall-54 10s -37.5s ease-in infinite;
    }

    .snowflake:nth-child(54) span {
        animation: spin 15s linear 0s infinite;
        filter: drop-shadow(0 0 3px #368BC1);
    }

    @keyframes fall-54 {
        0.3333333333% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 80.3vw;
        }
    }

    .snowflake:nth-child(55) {
        opacity: 0.38;
        font-size: 9px;
        left: 38.4vw;
        animation: fall-55 40s -27s ease-in infinite;
    }

    .snowflake:nth-child(55) span {
        animation: spin 9s linear 0s infinite;
        filter: drop-shadow(0 0 3px #368BC1);
    }

    @keyframes fall-55 {
        3.3333333333% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 1.9vw;
        }
    }

    .snowflake:nth-child(56) {
        opacity: 0.33;
        font-size: 12px;
        left: 43.6vw;
        animation: fall-56 10s -27s ease-in infinite;
    }

    .snowflake:nth-child(56) span {
        animation: spin 15s linear 0s infinite;
        filter: drop-shadow(0 0 5px #368BC1);
    }

    @keyframes fall-56 {
        2.3333333333% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 118.5vw;
        }
    }

    .snowflake:nth-child(57) {
        opacity: 0.16;
        font-size: 6px;
        left: 92.6vw;
        animation: fall-57 40s -33s ease-in infinite;
    }

    .snowflake:nth-child(57) span {
        animation: spin 3s linear 0s infinite;
        filter: drop-shadow(0 0 1px #368BC1);
    }

    @keyframes fall-57 {
        3.6666666667% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 59.2vw;
        }
    }

    .snowflake:nth-child(58) {
        opacity: 0.63;
        font-size: 9px;
        left: 7.8vw;
        animation: fall-58 40s -3s ease-in infinite;
    }

    .snowflake:nth-child(58) span {
        animation: spin 12s linear 0s infinite;
        filter: drop-shadow(0 0 3px #368BC1);
    }

    @keyframes fall-58 {
        0.3333333333% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 71.9vw;
        }
    }

    .snowflake:nth-child(59) {
        opacity: 0.06;
        font-size: 15px;
        left: 92.9vw;
        animation: fall-59 20s -10.5s ease-in infinite;
    }

    .snowflake:nth-child(59) span {
        animation: spin 3s linear 0s infinite;
        filter: drop-shadow(0 0 5px #368BC1);
    }

    @keyframes fall-59 {
        5.6666666667% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 50vw;
        }
    }

    .snowflake:nth-child(60) {
        opacity: 0.05;
        font-size: 12px;
        left: 119vw;
        animation: fall-60 50s -28.5s ease-in infinite;
    }

    .snowflake:nth-child(60) span {
        animation: spin 15s linear 0s infinite;
        filter: drop-shadow(0 0 4px #368BC1);
    }

    @keyframes fall-60 {
        4.3333333333% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 85.4vw;
        }
    }

    .snowflake:nth-child(61) {
        opacity: 0.33;
        font-size: 6px;
        left: 55.1vw;
        animation: fall-61 50s -4.5s ease-in infinite;
    }

    .snowflake:nth-child(61) span {
        animation: spin 6s linear 0s infinite;
        filter: drop-shadow(0 0 1px #368BC1);
    }

    @keyframes fall-61 {
        0.8333333333% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 62.5vw;
        }
    }

    .snowflake:nth-child(62) {
        opacity: 0.06;
        font-size: 3px;
        left: 52.7vw;
        animation: fall-62 40s -15s ease-in infinite;
    }

    .snowflake:nth-child(62) span {
        animation: spin 6s linear 0s infinite;
        filter: drop-shadow(0 0 4px #368BC1);
    }

    @keyframes fall-62 {
        3.5% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 76.5vw;
        }
    }

    .snowflake:nth-child(63) {
        opacity: 0.12;
        font-size: 9px;
        left: 78.4vw;
        animation: fall-63 10s -4.5s ease-in infinite;
    }

    .snowflake:nth-child(63) span {
        animation: spin 3s linear 0s infinite;
        filter: drop-shadow(0 0 2px #368BC1);
    }

    @keyframes fall-63 {
        1.5% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 72.8vw;
        }
    }

    .snowflake:nth-child(64) {
        opacity: 0.62;
        font-size: 15px;
        left: 38vw;
        animation: fall-64 10s -34.5s ease-in infinite;
    }

    .snowflake:nth-child(64) span {
        animation: spin 3s linear 0s infinite;
        filter: drop-shadow(0 0 4px #368BC1);
    }

    @keyframes fall-64 {
        2% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 23.8vw;
        }
    }

    .snowflake:nth-child(65) {
        opacity: 0.5;
        font-size: 9px;
        left: 89.9vw;
        animation: fall-65 50s -13.5s ease-in infinite;
    }

    .snowflake:nth-child(65) span {
        animation: spin 9s linear 0s infinite;
        filter: drop-shadow(0 0 4px #368BC1);
    }

    @keyframes fall-65 {
        1.5% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 27.4vw;
        }
    }

    .snowflake:nth-child(66) {
        opacity: 0.16;
        font-size: 6px;
        left: 56.7vw;
        animation: fall-66 20s -33s ease-in infinite;
    }

    .snowflake:nth-child(66) span {
        animation: spin 9s linear 0s infinite;
        filter: drop-shadow(0 0 5px #368BC1);
    }

    @keyframes fall-66 {
        3.8333333333% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 93.9vw;
        }
    }

    .snowflake:nth-child(67) {
        opacity: 0.76;
        font-size: 6px;
        left: 62.6vw;
        animation: fall-67 20s -9s ease-in infinite;
    }

    .snowflake:nth-child(67) span {
        animation: spin 9s linear 0s infinite;
        filter: drop-shadow(0 0 1px #368BC1);
    }

    @keyframes fall-67 {
        6.1666666667% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 108.1vw;
        }
    }

    .snowflake:nth-child(68) {
        opacity: 0.65;
        font-size: 6px;
        left: 7.6vw;
        animation: fall-68 50s -10.5s ease-in infinite;
    }

    .snowflake:nth-child(68) span {
        animation: spin 3s linear 0s infinite;
        filter: drop-shadow(0 0 2px #368BC1);
    }

    @keyframes fall-68 {
        2% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 18.2vw;
        }
    }

    .snowflake:nth-child(69) {
        opacity: 0.31;
        font-size: 15px;
        left: 96.8vw;
        animation: fall-69 20s -3s ease-in infinite;
    }

    .snowflake:nth-child(69) span {
        animation: spin 6s linear 0s infinite;
        filter: drop-shadow(0 0 5px #368BC1);
    }

    @keyframes fall-69 {
        1.1666666667% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 109.3vw;
        }
    }

    .snowflake:nth-child(70) {
        opacity: 0.8;
        font-size: 6px;
        left: 101.1vw;
        animation: fall-70 50s -33s ease-in infinite;
    }

    .snowflake:nth-child(70) span {
        animation: spin 3s linear 0s infinite;
        filter: drop-shadow(0 0 3px #368BC1);
    }

    @keyframes fall-70 {
        1.3333333333% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 42vw;
        }
    }

    .snowflake:nth-child(71) {
        opacity: 0.13;
        font-size: 9px;
        left: 13.8vw;
        animation: fall-71 40s -19.5s ease-in infinite;
    }

    .snowflake:nth-child(71) span {
        animation: spin 15s linear 0s infinite;
        filter: drop-shadow(0 0 5px #368BC1);
    }

    @keyframes fall-71 {
        7.1666666667% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 109.1vw;
        }
    }

    .snowflake:nth-child(72) {
        opacity: 0.89;
        font-size: 15px;
        left: 85.3vw;
        animation: fall-72 10s -10.5s ease-in infinite;
    }

    .snowflake:nth-child(72) span {
        animation: spin 9s linear 0s infinite;
        filter: drop-shadow(0 0 1px #368BC1);
    }

    @keyframes fall-72 {
        7.8333333333% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 113.1vw;
        }
    }

    .snowflake:nth-child(73) {
        opacity: 0.82;
        font-size: 6px;
        left: 22vw;
        animation: fall-73 10s -12s ease-in infinite;
    }

    .snowflake:nth-child(73) span {
        animation: spin 3s linear 0s infinite;
        filter: drop-shadow(0 0 3px #368BC1);
    }

    @keyframes fall-73 {
        6.1666666667% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 15.4vw;
        }
    }

    .snowflake:nth-child(74) {
        opacity: 0.36;
        font-size: 3px;
        left: 35.8vw;
        animation: fall-74 40s -31.5s ease-in infinite;
    }

    .snowflake:nth-child(74) span {
        animation: spin 15s linear 0s infinite;
        filter: drop-shadow(0 0 3px #368BC1);
    }

    @keyframes fall-74 {
        3.8333333333% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 86vw;
        }
    }

    .snowflake:nth-child(75) {
        opacity: 0.52;
        font-size: 9px;
        left: 79.7vw;
        animation: fall-75 10s -3s ease-in infinite;
    }

    .snowflake:nth-child(75) span {
        animation: spin 12s linear 0s infinite;
        filter: drop-shadow(0 0 1px #368BC1);
    }

    @keyframes fall-75 {
        6.8333333333% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 55.2vw;
        }
    }

    .snowflake:nth-child(76) {
        opacity: 0.81;
        font-size: 3px;
        left: 57vw;
        animation: fall-76 50s -19.5s ease-in infinite;
    }

    .snowflake:nth-child(76) span {
        animation: spin 6s linear 0s infinite;
        filter: drop-shadow(0 0 4px #368BC1);
    }

    @keyframes fall-76 {
        1.6666666667% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 30.1vw;
        }
    }

    .snowflake:nth-child(77) {
        opacity: 0.51;
        font-size: 6px;
        left: 104.7vw;
        animation: fall-77 50s -28.5s ease-in infinite;
    }

    .snowflake:nth-child(77) span {
        animation: spin 6s linear 0s infinite;
        filter: drop-shadow(0 0 4px #368BC1);
    }

    @keyframes fall-77 {
        7.5% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 116.8vw;
        }
    }

    .snowflake:nth-child(78) {
        opacity: 0.64;
        font-size: 9px;
        left: 52.2vw;
        animation: fall-78 50s -30s ease-in infinite;
    }

    .snowflake:nth-child(78) span {
        animation: spin 6s linear 0s infinite;
        filter: drop-shadow(0 0 1px #368BC1);
    }

    @keyframes fall-78 {
        2.3333333333% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 23.8vw;
        }
    }

    .snowflake:nth-child(79) {
        opacity: 0.83;
        font-size: 6px;
        left: 104.6vw;
        animation: fall-79 30s -4.5s ease-in infinite;
    }

    .snowflake:nth-child(79) span {
        animation: spin 9s linear 0s infinite;
        filter: drop-shadow(0 0 5px #368BC1);
    }

    @keyframes fall-79 {
        6.8333333333% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 92.9vw;
        }
    }

    .snowflake:nth-child(80) {
        opacity: 0.84;
        font-size: 12px;
        left: 71.7vw;
        animation: fall-80 10s -21s ease-in infinite;
    }

    .snowflake:nth-child(80) span {
        animation: spin 12s linear 0s infinite;
        filter: drop-shadow(0 0 2px #368BC1);
    }

    @keyframes fall-80 {
        2.8333333333% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 114.6vw;
        }
    }

    .snowflake:nth-child(81) {
        opacity: 0.49;
        font-size: 12px;
        left: 10.8vw;
        animation: fall-81 30s -9s ease-in infinite;
    }

    .snowflake:nth-child(81) span {
        animation: spin 15s linear 0s infinite;
        filter: drop-shadow(0 0 1px #368BC1);
    }

    @keyframes fall-81 {
        2.8333333333% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 103.4vw;
        }
    }

    .snowflake:nth-child(82) {
        opacity: 0.47;
        font-size: 9px;
        left: 13.8vw;
        animation: fall-82 40s -9s ease-in infinite;
    }

    .snowflake:nth-child(82) span {
        animation: spin 6s linear 0s infinite;
        filter: drop-shadow(0 0 2px #368BC1);
    }

    @keyframes fall-82 {
        2.3333333333% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 96.8vw;
        }
    }

    .snowflake:nth-child(83) {
        opacity: 0.33;
        font-size: 15px;
        left: 114.9vw;
        animation: fall-83 40s -30s ease-in infinite;
    }

    .snowflake:nth-child(83) span {
        animation: spin 9s linear 0s infinite;
        filter: drop-shadow(0 0 5px #368BC1);
    }

    @keyframes fall-83 {
        1.1666666667% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 39.8vw;
        }
    }

    .snowflake:nth-child(84) {
        opacity: 0.56;
        font-size: 6px;
        left: 94.3vw;
        animation: fall-84 50s -18s ease-in infinite;
    }

    .snowflake:nth-child(84) span {
        animation: spin 12s linear 0s infinite;
        filter: drop-shadow(0 0 2px #368BC1);
    }

    @keyframes fall-84 {
        1% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 60.3vw;
        }
    }

    .snowflake:nth-child(85) {
        opacity: 0.54;
        font-size: 12px;
        left: 46.7vw;
        animation: fall-85 20s -34.5s ease-in infinite;
    }

    .snowflake:nth-child(85) span {
        animation: spin 15s linear 0s infinite;
        filter: drop-shadow(0 0 3px #368BC1);
    }

    @keyframes fall-85 {
        4.6666666667% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 17.1vw;
        }
    }

    .snowflake:nth-child(86) {
        opacity: 0.06;
        font-size: 6px;
        left: 43.2vw;
        animation: fall-86 40s -15s ease-in infinite;
    }

    .snowflake:nth-child(86) span {
        animation: spin 9s linear 0s infinite;
        filter: drop-shadow(0 0 1px #368BC1);
    }

    @keyframes fall-86 {
        3.5% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 99vw;
        }
    }

    .snowflake:nth-child(87) {
        opacity: 0.2;
        font-size: 15px;
        left: 84.4vw;
        animation: fall-87 50s -3s ease-in infinite;
    }

    .snowflake:nth-child(87) span {
        animation: spin 12s linear 0s infinite;
        filter: drop-shadow(0 0 3px #368BC1);
    }

    @keyframes fall-87 {
        3.5% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 21.7vw;
        }
    }

    .snowflake:nth-child(88) {
        opacity: 0.85;
        font-size: 6px;
        left: 114.8vw;
        animation: fall-88 20s -13.5s ease-in infinite;
    }

    .snowflake:nth-child(88) span {
        animation: spin 9s linear 0s infinite;
        filter: drop-shadow(0 0 5px #368BC1);
    }

    @keyframes fall-88 {
        6.5% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 45.7vw;
        }
    }

    .snowflake:nth-child(89) {
        opacity: 0.29;
        font-size: 15px;
        left: 60.4vw;
        animation: fall-89 10s -7.5s ease-in infinite;
    }

    .snowflake:nth-child(89) span {
        animation: spin 12s linear 0s infinite;
        filter: drop-shadow(0 0 2px #368BC1);
    }

    @keyframes fall-89 {
        8% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 62.1vw;
        }
    }

    .snowflake:nth-child(90) {
        opacity: 0.6;
        font-size: 3px;
        left: 2.2vw;
        animation: fall-90 40s -7.5s ease-in infinite;
    }

    .snowflake:nth-child(90) span {
        animation: spin 9s linear 0s infinite;
        filter: drop-shadow(0 0 1px #368BC1);
    }

    @keyframes fall-90 {
        7.3333333333% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 117.3vw;
        }
    }

    .snowflake:nth-child(91) {
        opacity: 0.76;
        font-size: 6px;
        left: 7.2vw;
        animation: fall-91 40s -15s ease-in infinite;
    }

    .snowflake:nth-child(91) span {
        animation: spin 12s linear 0s infinite;
        filter: drop-shadow(0 0 1px #368BC1);
    }

    @keyframes fall-91 {
        6.8333333333% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 96.7vw;
        }
    }

    .snowflake:nth-child(92) {
        opacity: 0.11;
        font-size: 15px;
        left: 41.7vw;
        animation: fall-92 10s -18s ease-in infinite;
    }

    .snowflake:nth-child(92) span {
        animation: spin 15s linear 0s infinite;
        filter: drop-shadow(0 0 2px #368BC1);
    }

    @keyframes fall-92 {
        2.1666666667% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 72.8vw;
        }
    }

    .snowflake:nth-child(93) {
        opacity: 0.52;
        font-size: 3px;
        left: 39.7vw;
        animation: fall-93 50s -19.5s ease-in infinite;
    }

    .snowflake:nth-child(93) span {
        animation: spin 15s linear 0s infinite;
        filter: drop-shadow(0 0 4px #368BC1);
    }

    @keyframes fall-93 {
        0.5% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 40.9vw;
        }
    }

    .snowflake:nth-child(94) {
        opacity: 0.63;
        font-size: 6px;
        left: 73.1vw;
        animation: fall-94 50s -30s ease-in infinite;
    }

    .snowflake:nth-child(94) span {
        animation: spin 12s linear 0s infinite;
        filter: drop-shadow(0 0 2px #368BC1);
    }

    @keyframes fall-94 {
        0.3333333333% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 72.7vw;
        }
    }

    .snowflake:nth-child(95) {
        opacity: 0.04;
        font-size: 12px;
        left: 12.9vw;
        animation: fall-95 20s -22.5s ease-in infinite;
    }

    .snowflake:nth-child(95) span {
        animation: spin 3s linear 0s infinite;
        filter: drop-shadow(0 0 3px #368BC1);
    }

    @keyframes fall-95 {
        7% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 23.1vw;
        }
    }

    .snowflake:nth-child(96) {
        opacity: 0.09;
        font-size: 9px;
        left: 43.6vw;
        animation: fall-96 20s -21s ease-in infinite;
    }

    .snowflake:nth-child(96) span {
        animation: spin 6s linear 0s infinite;
        filter: drop-shadow(0 0 3px #368BC1);
    }

    @keyframes fall-96 {
        5.3333333333% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 45.2vw;
        }
    }

    .snowflake:nth-child(97) {
        opacity: 0.51;
        font-size: 6px;
        left: 98.3vw;
        animation: fall-97 40s -33s ease-in infinite;
    }

    .snowflake:nth-child(97) span {
        animation: spin 12s linear 0s infinite;
        filter: drop-shadow(0 0 1px #368BC1);
    }

    @keyframes fall-97 {
        5.5% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 61.1vw;
        }
    }

    .snowflake:nth-child(98) {
        opacity: 0.5;
        font-size: 3px;
        left: 83.9vw;
        animation: fall-98 10s -21s ease-in infinite;
    }

    .snowflake:nth-child(98) span {
        animation: spin 3s linear 0s infinite;
        filter: drop-shadow(0 0 2px #368BC1);
    }

    @keyframes fall-98 {
        4.1666666667% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 84.6vw;
        }
    }

    .snowflake:nth-child(99) {
        opacity: 0.27;
        font-size: 9px;
        left: 44.2vw;
        animation: fall-99 10s -6s ease-in infinite;
    }

    .snowflake:nth-child(99) span {
        animation: spin 6s linear 0s infinite;
        filter: drop-shadow(0 0 1px #368BC1);
    }

    @keyframes fall-99 {
        7.3333333333% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 29.7vw;
        }
    }

    .snowflake:nth-child(100) {
        opacity: 0.2;
        font-size: 9px;
        left: 19.1vw;
        animation: fall-100 10s -12s ease-in infinite;
    }

    .snowflake:nth-child(100) span {
        animation: spin 12s linear 0s infinite;
        filter: drop-shadow(0 0 4px #368BC1);
    }

    @keyframes fall-100 {
        7% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 65.5vw;
        }
    }

    .snowflake:nth-child(101) {
        opacity: 0.78;
        font-size: 9px;
        left: 46.5vw;
        animation: fall-101 30s -34.5s ease-in infinite;
    }

    .snowflake:nth-child(101) span {
        animation: spin 9s linear 0s infinite;
        filter: drop-shadow(0 0 3px #368BC1);
    }

    @keyframes fall-101 {
        3.8333333333% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 5.8vw;
        }
    }

    .snowflake:nth-child(102) {
        opacity: 0.14;
        font-size: 15px;
        left: 8.6vw;
        animation: fall-102 30s -15s ease-in infinite;
    }

    .snowflake:nth-child(102) span {
        animation: spin 12s linear 0s infinite;
        filter: drop-shadow(0 0 4px #368BC1);
    }

    @keyframes fall-102 {
        0.6666666667% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 110.9vw;
        }
    }

    .snowflake:nth-child(103) {
        opacity: 0.4;
        font-size: 3px;
        left: 33.1vw;
        animation: fall-103 50s -22.5s ease-in infinite;
    }

    .snowflake:nth-child(103) span {
        animation: spin 6s linear 0s infinite;
        filter: drop-shadow(0 0 1px #368BC1);
    }

    @keyframes fall-103 {
        5.3333333333% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 29.3vw;
        }
    }

    .snowflake:nth-child(104) {
        opacity: 0.1;
        font-size: 6px;
        left: 96.2vw;
        animation: fall-104 40s -28.5s ease-in infinite;
    }

    .snowflake:nth-child(104) span {
        animation: spin 12s linear 0s infinite;
        filter: drop-shadow(0 0 3px #368BC1);
    }

    @keyframes fall-104 {
        2.1666666667% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 6.4vw;
        }
    }

    .snowflake:nth-child(105) {
        opacity: 0.02;
        font-size: 9px;
        left: 49.8vw;
        animation: fall-105 20s -21s ease-in infinite;
    }

    .snowflake:nth-child(105) span {
        animation: spin 9s linear 0s infinite;
        filter: drop-shadow(0 0 4px #368BC1);
    }

    @keyframes fall-105 {
        6.6666666667% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 57.9vw;
        }
    }

    .snowflake:nth-child(106) {
        opacity: 0.68;
        font-size: 3px;
        left: 96.8vw;
        animation: fall-106 40s -37.5s ease-in infinite;
    }

    .snowflake:nth-child(106) span {
        animation: spin 12s linear 0s infinite;
        filter: drop-shadow(0 0 5px #368BC1);
    }

    @keyframes fall-106 {
        7.3333333333% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 111vw;
        }
    }

    .snowflake:nth-child(107) {
        opacity: 0.58;
        font-size: 12px;
        left: 104vw;
        animation: fall-107 40s -37.5s ease-in infinite;
    }

    .snowflake:nth-child(107) span {
        animation: spin 12s linear 0s infinite;
        filter: drop-shadow(0 0 3px #368BC1);
    }

    @keyframes fall-107 {
        1% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 23.7vw;
        }
    }

    .snowflake:nth-child(108) {
        opacity: 0.83;
        font-size: 3px;
        left: 104.2vw;
        animation: fall-108 50s -3s ease-in infinite;
    }

    .snowflake:nth-child(108) span {
        animation: spin 3s linear 0s infinite;
        filter: drop-shadow(0 0 4px #368BC1);
    }

    @keyframes fall-108 {
        7.1666666667% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 104.8vw;
        }
    }

    .snowflake:nth-child(109) {
        opacity: 0.42;
        font-size: 15px;
        left: 35.1vw;
        animation: fall-109 50s -19.5s ease-in infinite;
    }

    .snowflake:nth-child(109) span {
        animation: spin 6s linear 0s infinite;
        filter: drop-shadow(0 0 3px #368BC1);
    }

    @keyframes fall-109 {
        4.6666666667% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 8.1vw;
        }
    }

    .snowflake:nth-child(110) {
        opacity: 0.06;
        font-size: 3px;
        left: 78.9vw;
        animation: fall-110 10s -30s ease-in infinite;
    }

    .snowflake:nth-child(110) span {
        animation: spin 15s linear 0s infinite;
        filter: drop-shadow(0 0 3px #368BC1);
    }

    @keyframes fall-110 {
        3.1666666667% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 29.9vw;
        }
    }

    .snowflake:nth-child(111) {
        opacity: 0.2;
        font-size: 15px;
        left: 77.2vw;
        animation: fall-111 20s -30s ease-in infinite;
    }

    .snowflake:nth-child(111) span {
        animation: spin 3s linear 0s infinite;
        filter: drop-shadow(0 0 2px #368BC1);
    }

    @keyframes fall-111 {
        6.1666666667% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 74.2vw;
        }
    }

    .snowflake:nth-child(112) {
        opacity: 0.02;
        font-size: 6px;
        left: 59.8vw;
        animation: fall-112 10s -37.5s ease-in infinite;
    }

    .snowflake:nth-child(112) span {
        animation: spin 6s linear 0s infinite;
        filter: drop-shadow(0 0 4px #368BC1);
    }

    @keyframes fall-112 {
        0.1666666667% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 30.6vw;
        }
    }

    .snowflake:nth-child(113) {
        opacity: 0.06;
        font-size: 3px;
        left: 15.2vw;
        animation: fall-113 10s -1.5s ease-in infinite;
    }

    .snowflake:nth-child(113) span {
        animation: spin 12s linear 0s infinite;
        filter: drop-shadow(0 0 4px #368BC1);
    }

    @keyframes fall-113 {
        1.6666666667% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 27.4vw;
        }
    }

    .snowflake:nth-child(114) {
        opacity: 0.75;
        font-size: 9px;
        left: 115.7vw;
        animation: fall-114 30s -31.5s ease-in infinite;
    }

    .snowflake:nth-child(114) span {
        animation: spin 9s linear 0s infinite;
        filter: drop-shadow(0 0 5px #368BC1);
    }

    @keyframes fall-114 {
        6.6666666667% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 43.3vw;
        }
    }

    .snowflake:nth-child(115) {
        opacity: 0.87;
        font-size: 12px;
        left: 1.3vw;
        animation: fall-115 50s -9s ease-in infinite;
    }

    .snowflake:nth-child(115) span {
        animation: spin 9s linear 0s infinite;
        filter: drop-shadow(0 0 2px #368BC1);
    }

    @keyframes fall-115 {
        8% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 51.8vw;
        }
    }

    .snowflake:nth-child(116) {
        opacity: 0.16;
        font-size: 6px;
        left: 96.7vw;
        animation: fall-116 40s -13.5s ease-in infinite;
    }

    .snowflake:nth-child(116) span {
        animation: spin 3s linear 0s infinite;
        filter: drop-shadow(0 0 3px #368BC1);
    }

    @keyframes fall-116 {
        3.6666666667% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 76.9vw;
        }
    }

    .snowflake:nth-child(117) {
        opacity: 0.33;
        font-size: 15px;
        left: 22.9vw;
        animation: fall-117 30s -24s ease-in infinite;
    }

    .snowflake:nth-child(117) span {
        animation: spin 9s linear 0s infinite;
        filter: drop-shadow(0 0 4px #368BC1);
    }

    @keyframes fall-117 {
        4% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 22.9vw;
        }
    }

    .snowflake:nth-child(118) {
        opacity: 0.69;
        font-size: 15px;
        left: 82.6vw;
        animation: fall-118 40s -16.5s ease-in infinite;
    }

    .snowflake:nth-child(118) span {
        animation: spin 12s linear 0s infinite;
        filter: drop-shadow(0 0 1px #368BC1);
    }

    @keyframes fall-118 {
        6.1666666667% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 30.2vw;
        }
    }

    .snowflake:nth-child(119) {
        opacity: 0.12;
        font-size: 9px;
        left: 7.3vw;
        animation: fall-119 30s -15s ease-in infinite;
    }

    .snowflake:nth-child(119) span {
        animation: spin 9s linear 0s infinite;
        filter: drop-shadow(0 0 3px #368BC1);
    }

    @keyframes fall-119 {
        1.8333333333% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 38.4vw;
        }
    }

    .snowflake:nth-child(120) {
        opacity: 0.33;
        font-size: 3px;
        left: 55.2vw;
        animation: fall-120 30s -31.5s ease-in infinite;
    }

    .snowflake:nth-child(120) span {
        animation: spin 3s linear 0s infinite;
        filter: drop-shadow(0 0 1px #368BC1);
    }

    @keyframes fall-120 {
        6% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 29.9vw;
        }
    }

    .snowflake:nth-child(121) {
        opacity: 0.63;
        font-size: 9px;
        left: 3.7vw;
        animation: fall-121 50s -1.5s ease-in infinite;
    }

    .snowflake:nth-child(121) span {
        animation: spin 3s linear 0s infinite;
        filter: drop-shadow(0 0 4px #368BC1);
    }

    @keyframes fall-121 {
        7% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 86.5vw;
        }
    }

    .snowflake:nth-child(122) {
        opacity: 0.12;
        font-size: 6px;
        left: 117.6vw;
        animation: fall-122 50s -10.5s ease-in infinite;
    }

    .snowflake:nth-child(122) span {
        animation: spin 9s linear 0s infinite;
        filter: drop-shadow(0 0 5px #368BC1);
    }

    @keyframes fall-122 {
        3.8333333333% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 64.5vw;
        }
    }

    .snowflake:nth-child(123) {
        opacity: 0.6;
        font-size: 3px;
        left: 115.1vw;
        animation: fall-123 30s -12s ease-in infinite;
    }

    .snowflake:nth-child(123) span {
        animation: spin 15s linear 0s infinite;
        filter: drop-shadow(0 0 4px #368BC1);
    }

    @keyframes fall-123 {
        2.3333333333% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 23vw;
        }
    }

    .snowflake:nth-child(124) {
        opacity: 0.34;
        font-size: 9px;
        left: 89.3vw;
        animation: fall-124 30s -7.5s ease-in infinite;
    }

    .snowflake:nth-child(124) span {
        animation: spin 12s linear 0s infinite;
        filter: drop-shadow(0 0 1px #368BC1);
    }

    @keyframes fall-124 {
        5.8333333333% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 23.1vw;
        }
    }

    .snowflake:nth-child(125) {
        opacity: 0.15;
        font-size: 15px;
        left: 86.6vw;
        animation: fall-125 10s -37.5s ease-in infinite;
    }

    .snowflake:nth-child(125) span {
        animation: spin 15s linear 0s infinite;
        filter: drop-shadow(0 0 5px #368BC1);
    }

    @keyframes fall-125 {
        5.6666666667% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 76.5vw;
        }
    }

    .snowflake:nth-child(126) {
        opacity: 0.49;
        font-size: 3px;
        left: 60.4vw;
        animation: fall-126 30s -13.5s ease-in infinite;
    }

    .snowflake:nth-child(126) span {
        animation: spin 9s linear 0s infinite;
        filter: drop-shadow(0 0 4px #368BC1);
    }

    @keyframes fall-126 {
        6.3333333333% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 89.9vw;
        }
    }

    .snowflake:nth-child(127) {
        opacity: 0.43;
        font-size: 6px;
        left: 61.1vw;
        animation: fall-127 20s -30s ease-in infinite;
    }

    .snowflake:nth-child(127) span {
        animation: spin 15s linear 0s infinite;
        filter: drop-shadow(0 0 2px #368BC1);
    }

    @keyframes fall-127 {
        4.8333333333% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 92.9vw;
        }
    }

    .snowflake:nth-child(128) {
        opacity: 0.12;
        font-size: 3px;
        left: 59.9vw;
        animation: fall-128 20s -16.5s ease-in infinite;
    }

    .snowflake:nth-child(128) span {
        animation: spin 3s linear 0s infinite;
        filter: drop-shadow(0 0 1px #368BC1);
    }

    @keyframes fall-128 {
        2% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 11.9vw;
        }
    }

    .snowflake:nth-child(129) {
        opacity: 0.06;
        font-size: 15px;
        left: 112.1vw;
        animation: fall-129 30s -15s ease-in infinite;
    }

    .snowflake:nth-child(129) span {
        animation: spin 3s linear 0s infinite;
        filter: drop-shadow(0 0 3px #368BC1);
    }

    @keyframes fall-129 {
        7.8333333333% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 63.2vw;
        }
    }

    .snowflake:nth-child(130) {
        opacity: 0.15;
        font-size: 9px;
        left: 29.6vw;
        animation: fall-130 30s -37.5s ease-in infinite;
    }

    .snowflake:nth-child(130) span {
        animation: spin 15s linear 0s infinite;
        filter: drop-shadow(0 0 2px #368BC1);
    }

    @keyframes fall-130 {
        8% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 85.8vw;
        }
    }

    .snowflake:nth-child(131) {
        opacity: 0.5;
        font-size: 12px;
        left: 9.6vw;
        animation: fall-131 20s -9s ease-in infinite;
    }

    .snowflake:nth-child(131) span {
        animation: spin 3s linear 0s infinite;
        filter: drop-shadow(0 0 3px #368BC1);
    }

    @keyframes fall-131 {
        3.5% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 111.2vw;
        }
    }

    .snowflake:nth-child(132) {
        opacity: 0.34;
        font-size: 15px;
        left: 29.2vw;
        animation: fall-132 10s -19.5s ease-in infinite;
    }

    .snowflake:nth-child(132) span {
        animation: spin 9s linear 0s infinite;
        filter: drop-shadow(0 0 4px #368BC1);
    }

    @keyframes fall-132 {
        3.3333333333% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 83.4vw;
        }
    }

    .snowflake:nth-child(133) {
        opacity: 0.31;
        font-size: 6px;
        left: 26.4vw;
        animation: fall-133 20s -10.5s ease-in infinite;
    }

    .snowflake:nth-child(133) span {
        animation: spin 3s linear 0s infinite;
        filter: drop-shadow(0 0 5px #368BC1);
    }

    @keyframes fall-133 {
        2.6666666667% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 40.9vw;
        }
    }

    .snowflake:nth-child(134) {
        opacity: 0.87;
        font-size: 6px;
        left: 117.3vw;
        animation: fall-134 30s -4.5s ease-in infinite;
    }

    .snowflake:nth-child(134) span {
        animation: spin 15s linear 0s infinite;
        filter: drop-shadow(0 0 4px #368BC1);
    }

    @keyframes fall-134 {
        2.3333333333% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 108.2vw;
        }
    }

    .snowflake:nth-child(135) {
        opacity: 0.25;
        font-size: 6px;
        left: 70.4vw;
        animation: fall-135 10s -19.5s ease-in infinite;
    }

    .snowflake:nth-child(135) span {
        animation: spin 9s linear 0s infinite;
        filter: drop-shadow(0 0 3px #368BC1);
    }

    @keyframes fall-135 {
        7.3333333333% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 84.9vw;
        }
    }

    .snowflake:nth-child(136) {
        opacity: 0.79;
        font-size: 6px;
        left: 100.4vw;
        animation: fall-136 50s -6s ease-in infinite;
    }

    .snowflake:nth-child(136) span {
        animation: spin 12s linear 0s infinite;
        filter: drop-shadow(0 0 1px #368BC1);
    }

    @keyframes fall-136 {
        6.1666666667% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 117.2vw;
        }
    }

    .snowflake:nth-child(137) {
        opacity: 0.03;
        font-size: 3px;
        left: 1.7vw;
        animation: fall-137 50s -10.5s ease-in infinite;
    }

    .snowflake:nth-child(137) span {
        animation: spin 3s linear 0s infinite;
        filter: drop-shadow(0 0 3px #368BC1);
    }

    @keyframes fall-137 {
        6.6666666667% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 67vw;
        }
    }

    .snowflake:nth-child(138) {
        opacity: 0.45;
        font-size: 15px;
        left: 69.1vw;
        animation: fall-138 10s -16.5s ease-in infinite;
    }

    .snowflake:nth-child(138) span {
        animation: spin 9s linear 0s infinite;
        filter: drop-shadow(0 0 3px #368BC1);
    }

    @keyframes fall-138 {
        6% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 46.5vw;
        }
    }

    .snowflake:nth-child(139) {
        opacity: 0.75;
        font-size: 15px;
        left: 67.2vw;
        animation: fall-139 30s -18s ease-in infinite;
    }

    .snowflake:nth-child(139) span {
        animation: spin 15s linear 0s infinite;
        filter: drop-shadow(0 0 1px #368BC1);
    }

    @keyframes fall-139 {
        6% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 34.7vw;
        }
    }

    .snowflake:nth-child(140) {
        opacity: 0.33;
        font-size: 15px;
        left: 103.6vw;
        animation: fall-140 40s -19.5s ease-in infinite;
    }

    .snowflake:nth-child(140) span {
        animation: spin 15s linear 0s infinite;
        filter: drop-shadow(0 0 3px #368BC1);
    }

    @keyframes fall-140 {
        1.6666666667% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 118.8vw;
        }
    }

    .snowflake:nth-child(141) {
        opacity: 0.89;
        font-size: 9px;
        left: 89.8vw;
        animation: fall-141 50s -24s ease-in infinite;
    }

    .snowflake:nth-child(141) span {
        animation: spin 15s linear 0s infinite;
        filter: drop-shadow(0 0 4px #368BC1);
    }

    @keyframes fall-141 {
        2.3333333333% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 28.3vw;
        }
    }

    .snowflake:nth-child(142) {
        opacity: 0.56;
        font-size: 3px;
        left: 90.1vw;
        animation: fall-142 50s -12s ease-in infinite;
    }

    .snowflake:nth-child(142) span {
        animation: spin 15s linear 0s infinite;
        filter: drop-shadow(0 0 4px #368BC1);
    }

    @keyframes fall-142 {
        7.5% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 73.6vw;
        }
    }

    .snowflake:nth-child(143) {
        opacity: 0.08;
        font-size: 3px;
        left: 27.5vw;
        animation: fall-143 40s -1.5s ease-in infinite;
    }

    .snowflake:nth-child(143) span {
        animation: spin 15s linear 0s infinite;
        filter: drop-shadow(0 0 1px #368BC1);
    }

    @keyframes fall-143 {
        2.5% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 106.2vw;
        }
    }

    .snowflake:nth-child(144) {
        opacity: 0.24;
        font-size: 9px;
        left: 65.9vw;
        animation: fall-144 40s -13.5s ease-in infinite;
    }

    .snowflake:nth-child(144) span {
        animation: spin 3s linear 0s infinite;
        filter: drop-shadow(0 0 1px #368BC1);
    }

    @keyframes fall-144 {
        5.3333333333% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 69.7vw;
        }
    }

    .snowflake:nth-child(145) {
        opacity: 0.22;
        font-size: 12px;
        left: 94.8vw;
        animation: fall-145 50s -3s ease-in infinite;
    }

    .snowflake:nth-child(145) span {
        animation: spin 15s linear 0s infinite;
        filter: drop-shadow(0 0 5px #368BC1);
    }

    @keyframes fall-145 {
        7.5% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 14.3vw;
        }
    }

    .snowflake:nth-child(146) {
        opacity: 0.12;
        font-size: 12px;
        left: 78.5vw;
        animation: fall-146 10s -21s ease-in infinite;
    }

    .snowflake:nth-child(146) span {
        animation: spin 6s linear 0s infinite;
        filter: drop-shadow(0 0 3px #368BC1);
    }

    @keyframes fall-146 {
        5.5% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 48.1vw;
        }
    }

    .snowflake:nth-child(147) {
        opacity: 0.76;
        font-size: 6px;
        left: 56.9vw;
        animation: fall-147 50s -24s ease-in infinite;
    }

    .snowflake:nth-child(147) span {
        animation: spin 12s linear 0s infinite;
        filter: drop-shadow(0 0 5px #368BC1);
    }

    @keyframes fall-147 {
        4% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 110.5vw;
        }
    }

    .snowflake:nth-child(148) {
        opacity: 0.83;
        font-size: 3px;
        left: 116.2vw;
        animation: fall-148 30s -36s ease-in infinite;
    }

    .snowflake:nth-child(148) span {
        animation: spin 6s linear 0s infinite;
        filter: drop-shadow(0 0 3px #368BC1);
    }

    @keyframes fall-148 {
        2.3333333333% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 106.2vw;
        }
    }

    .snowflake:nth-child(149) {
        opacity: 0.44;
        font-size: 6px;
        left: 27.2vw;
        animation: fall-149 40s -22.5s ease-in infinite;
    }

    .snowflake:nth-child(149) span {
        animation: spin 12s linear 0s infinite;
        filter: drop-shadow(0 0 4px #368BC1);
    }

    @keyframes fall-149 {
        5.5% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 108.9vw;
        }
    }

    .snowflake:nth-child(150) {
        opacity: 0.33;
        font-size: 15px;
        left: 81.4vw;
        animation: fall-150 10s -25.5s ease-in infinite;
    }

    .snowflake:nth-child(150) span {
        animation: spin 15s linear 0s infinite;
        filter: drop-shadow(0 0 1px #368BC1);
    }

    @keyframes fall-150 {
        1.1666666667% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 46.4vw;
        }
    }

    .snowflake:nth-child(151) {
        opacity: 0.57;
        font-size: 3px;
        left: 52.5vw;
        animation: fall-151 10s -13.5s ease-in infinite;
    }

    .snowflake:nth-child(151) span {
        animation: spin 12s linear 0s infinite;
        filter: drop-shadow(0 0 2px #368BC1);
    }

    @keyframes fall-151 {
        1.5% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 23.8vw;
        }
    }

    .snowflake:nth-child(152) {
        opacity: 0.74;
        font-size: 3px;
        left: 102.1vw;
        animation: fall-152 50s -18s ease-in infinite;
    }

    .snowflake:nth-child(152) span {
        animation: spin 6s linear 0s infinite;
        filter: drop-shadow(0 0 5px #368BC1);
    }

    @keyframes fall-152 {
        2% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 86.6vw;
        }
    }

    .snowflake:nth-child(153) {
        opacity: 0.67;
        font-size: 6px;
        left: 78.7vw;
        animation: fall-153 40s -9s ease-in infinite;
    }

    .snowflake:nth-child(153) span {
        animation: spin 12s linear 0s infinite;
        filter: drop-shadow(0 0 4px #368BC1);
    }

    @keyframes fall-153 {
        7.3333333333% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 77.7vw;
        }
    }

    .snowflake:nth-child(154) {
        opacity: 0.25;
        font-size: 12px;
        left: 84.8vw;
        animation: fall-154 40s -9s ease-in infinite;
    }

    .snowflake:nth-child(154) span {
        animation: spin 15s linear 0s infinite;
        filter: drop-shadow(0 0 4px #368BC1);
    }

    @keyframes fall-154 {
        4.1666666667% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 111.5vw;
        }
    }

    .snowflake:nth-child(155) {
        opacity: 0.45;
        font-size: 3px;
        left: 51.8vw;
        animation: fall-155 40s -31.5s ease-in infinite;
    }

    .snowflake:nth-child(155) span {
        animation: spin 12s linear 0s infinite;
        filter: drop-shadow(0 0 1px #368BC1);
    }

    @keyframes fall-155 {
        3.8333333333% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 118.3vw;
        }
    }

    .snowflake:nth-child(156) {
        opacity: 0.54;
        font-size: 15px;
        left: 72.4vw;
        animation: fall-156 10s -3s ease-in infinite;
    }

    .snowflake:nth-child(156) span {
        animation: spin 15s linear 0s infinite;
        filter: drop-shadow(0 0 3px #368BC1);
    }

    @keyframes fall-156 {
        1% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 58vw;
        }
    }

    .snowflake:nth-child(157) {
        opacity: 0.74;
        font-size: 15px;
        left: 16.6vw;
        animation: fall-157 30s -7.5s ease-in infinite;
    }

    .snowflake:nth-child(157) span {
        animation: spin 15s linear 0s infinite;
        filter: drop-shadow(0 0 2px #368BC1);
    }

    @keyframes fall-157 {
        6.6666666667% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 117.8vw;
        }
    }

    .snowflake:nth-child(158) {
        opacity: 0.33;
        font-size: 15px;
        left: 27.2vw;
        animation: fall-158 20s -10.5s ease-in infinite;
    }

    .snowflake:nth-child(158) span {
        animation: spin 3s linear 0s infinite;
        filter: drop-shadow(0 0 4px #368BC1);
    }

    @keyframes fall-158 {
        8% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 77.6vw;
        }
    }

    .snowflake:nth-child(159) {
        opacity: 0.45;
        font-size: 12px;
        left: 111.5vw;
        animation: fall-159 20s -30s ease-in infinite;
    }

    .snowflake:nth-child(159) span {
        animation: spin 6s linear 0s infinite;
        filter: drop-shadow(0 0 1px #368BC1);
    }

    @keyframes fall-159 {
        1% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 109.4vw;
        }
    }

    .snowflake:nth-child(160) {
        opacity: 0.58;
        font-size: 6px;
        left: 35.7vw;
        animation: fall-160 40s -6s ease-in infinite;
    }

    .snowflake:nth-child(160) span {
        animation: spin 15s linear 0s infinite;
        filter: drop-shadow(0 0 5px #368BC1);
    }

    @keyframes fall-160 {
        3.3333333333% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 25vw;
        }
    }

    .snowflake:nth-child(161) {
        opacity: 0.51;
        font-size: 3px;
        left: 21.7vw;
        animation: fall-161 50s -28.5s ease-in infinite;
    }

    .snowflake:nth-child(161) span {
        animation: spin 9s linear 0s infinite;
        filter: drop-shadow(0 0 4px #368BC1);
    }

    @keyframes fall-161 {
        2.1666666667% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 36.4vw;
        }
    }

    .snowflake:nth-child(162) {
        opacity: 0.2;
        font-size: 12px;
        left: 66.9vw;
        animation: fall-162 40s -21s ease-in infinite;
    }

    .snowflake:nth-child(162) span {
        animation: spin 12s linear 0s infinite;
        filter: drop-shadow(0 0 5px #368BC1);
    }

    @keyframes fall-162 {
        3.8333333333% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 87.6vw;
        }
    }

    .snowflake:nth-child(163) {
        opacity: 0.77;
        font-size: 15px;
        left: 101.7vw;
        animation: fall-163 30s -27s ease-in infinite;
    }

    .snowflake:nth-child(163) span {
        animation: spin 3s linear 0s infinite;
        filter: drop-shadow(0 0 4px #368BC1);
    }

    @keyframes fall-163 {
        6.6666666667% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 59.1vw;
        }
    }

    .snowflake:nth-child(164) {
        opacity: 0.65;
        font-size: 12px;
        left: 52.9vw;
        animation: fall-164 40s -30s ease-in infinite;
    }

    .snowflake:nth-child(164) span {
        animation: spin 15s linear 0s infinite;
        filter: drop-shadow(0 0 2px #368BC1);
    }

    @keyframes fall-164 {
        3.5% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 11.3vw;
        }
    }

    .snowflake:nth-child(165) {
        opacity: 0.88;
        font-size: 6px;
        left: 119vw;
        animation: fall-165 50s -19.5s ease-in infinite;
    }

    .snowflake:nth-child(165) span {
        animation: spin 15s linear 0s infinite;
        filter: drop-shadow(0 0 2px #368BC1);
    }

    @keyframes fall-165 {
        5.5% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 58.9vw;
        }
    }

    .snowflake:nth-child(166) {
        opacity: 0.62;
        font-size: 12px;
        left: 40.8vw;
        animation: fall-166 30s -37.5s ease-in infinite;
    }

    .snowflake:nth-child(166) span {
        animation: spin 15s linear 0s infinite;
        filter: drop-shadow(0 0 5px #368BC1);
    }

    @keyframes fall-166 {
        0.8333333333% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 119.7vw;
        }
    }

    .snowflake:nth-child(167) {
        opacity: 0.76;
        font-size: 9px;
        left: 54.3vw;
        animation: fall-167 50s -1.5s ease-in infinite;
    }

    .snowflake:nth-child(167) span {
        animation: spin 3s linear 0s infinite;
        filter: drop-shadow(0 0 5px #368BC1);
    }

    @keyframes fall-167 {
        7% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 76.1vw;
        }
    }

    .snowflake:nth-child(168) {
        opacity: 0.81;
        font-size: 15px;
        left: 79vw;
        animation: fall-168 20s -12s ease-in infinite;
    }

    .snowflake:nth-child(168) span {
        animation: spin 15s linear 0s infinite;
        filter: drop-shadow(0 0 3px #368BC1);
    }

    @keyframes fall-168 {
        2.6666666667% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 90.5vw;
        }
    }

    .snowflake:nth-child(169) {
        opacity: 0.87;
        font-size: 9px;
        left: 54.7vw;
        animation: fall-169 20s -33s ease-in infinite;
    }

    .snowflake:nth-child(169) span {
        animation: spin 15s linear 0s infinite;
        filter: drop-shadow(0 0 4px #368BC1);
    }

    @keyframes fall-169 {
        8.3333333333% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 13.5vw;
        }
    }

    .snowflake:nth-child(170) {
        opacity: 0.75;
        font-size: 15px;
        left: 20.2vw;
        animation: fall-170 30s -3s ease-in infinite;
    }

    .snowflake:nth-child(170) span {
        animation: spin 12s linear 0s infinite;
        filter: drop-shadow(0 0 2px #368BC1);
    }

    @keyframes fall-170 {
        0.6666666667% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 67.3vw;
        }
    }

    .snowflake:nth-child(171) {
        opacity: 0.11;
        font-size: 6px;
        left: 110.3vw;
        animation: fall-171 40s -31.5s ease-in infinite;
    }

    .snowflake:nth-child(171) span {
        animation: spin 6s linear 0s infinite;
        filter: drop-shadow(0 0 5px #368BC1);
    }

    @keyframes fall-171 {
        1.5% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 112.4vw;
        }
    }

    .snowflake:nth-child(172) {
        opacity: 0.49;
        font-size: 6px;
        left: 74.3vw;
        animation: fall-172 30s -12s ease-in infinite;
    }

    .snowflake:nth-child(172) span {
        animation: spin 6s linear 0s infinite;
        filter: drop-shadow(0 0 5px #368BC1);
    }

    @keyframes fall-172 {
        6.1666666667% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 104.9vw;
        }
    }

    .snowflake:nth-child(173) {
        opacity: 0.49;
        font-size: 9px;
        left: 96.4vw;
        animation: fall-173 10s -10.5s ease-in infinite;
    }

    .snowflake:nth-child(173) span {
        animation: spin 3s linear 0s infinite;
        filter: drop-shadow(0 0 4px #368BC1);
    }

    @keyframes fall-173 {
        3.1666666667% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 53.9vw;
        }
    }

    .snowflake:nth-child(174) {
        opacity: 0.08;
        font-size: 9px;
        left: 46.8vw;
        animation: fall-174 30s -24s ease-in infinite;
    }

    .snowflake:nth-child(174) span {
        animation: spin 12s linear 0s infinite;
        filter: drop-shadow(0 0 2px #368BC1);
    }

    @keyframes fall-174 {
        6% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 20.8vw;
        }
    }

    .snowflake:nth-child(175) {
        opacity: 0.41;
        font-size: 9px;
        left: 117.7vw;
        animation: fall-175 50s -1.5s ease-in infinite;
    }

    .snowflake:nth-child(175) span {
        animation: spin 3s linear 0s infinite;
        filter: drop-shadow(0 0 4px #368BC1);
    }

    @keyframes fall-175 {
        3% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 21.1vw;
        }
    }

    .snowflake:nth-child(176) {
        opacity: 0.63;
        font-size: 6px;
        left: 68.2vw;
        animation: fall-176 40s -21s ease-in infinite;
    }

    .snowflake:nth-child(176) span {
        animation: spin 3s linear 0s infinite;
        filter: drop-shadow(0 0 2px #368BC1);
    }

    @keyframes fall-176 {
        2.3333333333% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 73.1vw;
        }
    }

    .snowflake:nth-child(177) {
        opacity: 0.77;
        font-size: 12px;
        left: 24.9vw;
        animation: fall-177 20s -33s ease-in infinite;
    }

    .snowflake:nth-child(177) span {
        animation: spin 15s linear 0s infinite;
        filter: drop-shadow(0 0 4px #368BC1);
    }

    @keyframes fall-177 {
        7.6666666667% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 22vw;
        }
    }

    .snowflake:nth-child(178) {
        opacity: 0.46;
        font-size: 12px;
        left: 79.1vw;
        animation: fall-178 30s -6s ease-in infinite;
    }

    .snowflake:nth-child(178) span {
        animation: spin 9s linear 0s infinite;
        filter: drop-shadow(0 0 2px #368BC1);
    }

    @keyframes fall-178 {
        8% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 95.3vw;
        }
    }

    .snowflake:nth-child(179) {
        opacity: 0.14;
        font-size: 3px;
        left: 55.6vw;
        animation: fall-179 10s -33s ease-in infinite;
    }

    .snowflake:nth-child(179) span {
        animation: spin 12s linear 0s infinite;
        filter: drop-shadow(0 0 5px #368BC1);
    }

    @keyframes fall-179 {
        4.1666666667% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 59.6vw;
        }
    }

    .snowflake:nth-child(180) {
        opacity: 0.04;
        font-size: 15px;
        left: 19.8vw;
        animation: fall-180 40s -25.5s ease-in infinite;
    }

    .snowflake:nth-child(180) span {
        animation: spin 12s linear 0s infinite;
        filter: drop-shadow(0 0 5px #368BC1);
    }

    @keyframes fall-180 {
        0.8333333333% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 79.2vw;
        }
    }

    .snowflake:nth-child(181) {
        opacity: 0.2;
        font-size: 12px;
        left: 109.6vw;
        animation: fall-181 30s -13.5s ease-in infinite;
    }

    .snowflake:nth-child(181) span {
        animation: spin 6s linear 0s infinite;
        filter: drop-shadow(0 0 1px #368BC1);
    }

    @keyframes fall-181 {
        2.5% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 4.5vw;
        }
    }

    .snowflake:nth-child(182) {
        opacity: 0.71;
        font-size: 12px;
        left: 81.2vw;
        animation: fall-182 10s -31.5s ease-in infinite;
    }

    .snowflake:nth-child(182) span {
        animation: spin 12s linear 0s infinite;
        filter: drop-shadow(0 0 4px #368BC1);
    }

    @keyframes fall-182 {
        1.6666666667% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 88.8vw;
        }
    }

    .snowflake:nth-child(183) {
        opacity: 0.36;
        font-size: 9px;
        left: 119.4vw;
        animation: fall-183 40s -28.5s ease-in infinite;
    }

    .snowflake:nth-child(183) span {
        animation: spin 9s linear 0s infinite;
        filter: drop-shadow(0 0 1px #368BC1);
    }

    @keyframes fall-183 {
        7.3333333333% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 50.7vw;
        }
    }

    .snowflake:nth-child(184) {
        opacity: 0.33;
        font-size: 12px;
        left: 1.1vw;
        animation: fall-184 20s -9s ease-in infinite;
    }

    .snowflake:nth-child(184) span {
        animation: spin 3s linear 0s infinite;
        filter: drop-shadow(0 0 4px #368BC1);
    }

    @keyframes fall-184 {
        2.3333333333% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 99.3vw;
        }
    }

    .snowflake:nth-child(185) {
        opacity: 0.43;
        font-size: 9px;
        left: 99.2vw;
        animation: fall-185 30s -13.5s ease-in infinite;
    }

    .snowflake:nth-child(185) span {
        animation: spin 3s linear 0s infinite;
        filter: drop-shadow(0 0 1px #368BC1);
    }

    @keyframes fall-185 {
        1.5% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 4.9vw;
        }
    }

    .snowflake:nth-child(186) {
        opacity: 0.89;
        font-size: 12px;
        left: 52.7vw;
        animation: fall-186 30s -31.5s ease-in infinite;
    }

    .snowflake:nth-child(186) span {
        animation: spin 3s linear 0s infinite;
        filter: drop-shadow(0 0 5px #368BC1);
    }

    @keyframes fall-186 {
        3.3333333333% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 88.1vw;
        }
    }

    .snowflake:nth-child(187) {
        opacity: 0.8;
        font-size: 9px;
        left: 32.8vw;
        animation: fall-187 30s -33s ease-in infinite;
    }

    .snowflake:nth-child(187) span {
        animation: spin 12s linear 0s infinite;
        filter: drop-shadow(0 0 2px #368BC1);
    }

    @keyframes fall-187 {
        8.3333333333% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 111.9vw;
        }
    }

    .snowflake:nth-child(188) {
        opacity: 0.76;
        font-size: 12px;
        left: 108vw;
        animation: fall-188 20s -24s ease-in infinite;
    }

    .snowflake:nth-child(188) span {
        animation: spin 3s linear 0s infinite;
        filter: drop-shadow(0 0 1px #368BC1);
    }

    @keyframes fall-188 {
        5.3333333333% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 101.4vw;
        }
    }

    .snowflake:nth-child(189) {
        opacity: 0.3;
        font-size: 15px;
        left: 66vw;
        animation: fall-189 20s -19.5s ease-in infinite;
    }

    .snowflake:nth-child(189) span {
        animation: spin 15s linear 0s infinite;
        filter: drop-shadow(0 0 5px #368BC1);
    }

    @keyframes fall-189 {
        5.1666666667% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 106.7vw;
        }
    }

    .snowflake:nth-child(190) {
        opacity: 0.26;
        font-size: 6px;
        left: 51.4vw;
        animation: fall-190 50s -19.5s ease-in infinite;
    }

    .snowflake:nth-child(190) span {
        animation: spin 15s linear 0s infinite;
        filter: drop-shadow(0 0 1px #368BC1);
    }

    @keyframes fall-190 {
        1.5% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 110.9vw;
        }
    }

    .snowflake:nth-child(191) {
        opacity: 0.29;
        font-size: 12px;
        left: 74.2vw;
        animation: fall-191 20s -33s ease-in infinite;
    }

    .snowflake:nth-child(191) span {
        animation: spin 6s linear 0s infinite;
        filter: drop-shadow(0 0 5px #368BC1);
    }

    @keyframes fall-191 {
        7.8333333333% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 26.6vw;
        }
    }

    .snowflake:nth-child(192) {
        opacity: 0.42;
        font-size: 6px;
        left: 41.3vw;
        animation: fall-192 10s -31.5s ease-in infinite;
    }

    .snowflake:nth-child(192) span {
        animation: spin 9s linear 0s infinite;
        filter: drop-shadow(0 0 1px #368BC1);
    }

    @keyframes fall-192 {
        1.3333333333% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 63.3vw;
        }
    }

    .snowflake:nth-child(193) {
        opacity: 0.39;
        font-size: 15px;
        left: 108.9vw;
        animation: fall-193 20s -28.5s ease-in infinite;
    }

    .snowflake:nth-child(193) span {
        animation: spin 6s linear 0s infinite;
        filter: drop-shadow(0 0 5px #368BC1);
    }

    @keyframes fall-193 {
        0.8333333333% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 40.6vw;
        }
    }

    .snowflake:nth-child(194) {
        opacity: 0.72;
        font-size: 15px;
        left: 55.3vw;
        animation: fall-194 20s -13.5s ease-in infinite;
    }

    .snowflake:nth-child(194) span {
        animation: spin 6s linear 0s infinite;
        filter: drop-shadow(0 0 4px #368BC1);
    }

    @keyframes fall-194 {
        5.5% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 89.7vw;
        }
    }

    .snowflake:nth-child(195) {
        opacity: 0.67;
        font-size: 9px;
        left: 72.8vw;
        animation: fall-195 40s -24s ease-in infinite;
    }

    .snowflake:nth-child(195) span {
        animation: spin 9s linear 0s infinite;
        filter: drop-shadow(0 0 1px #368BC1);
    }

    @keyframes fall-195 {
        6.8333333333% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 5.1vw;
        }
    }

    .snowflake:nth-child(196) {
        opacity: 0.74;
        font-size: 6px;
        left: 93.1vw;
        animation: fall-196 40s -25.5s ease-in infinite;
    }

    .snowflake:nth-child(196) span {
        animation: spin 3s linear 0s infinite;
        filter: drop-shadow(0 0 4px #368BC1);
    }

    @keyframes fall-196 {
        3.6666666667% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 60.6vw;
        }
    }

    .snowflake:nth-child(197) {
        opacity: 0.1;
        font-size: 12px;
        left: 106.3vw;
        animation: fall-197 30s -7.5s ease-in infinite;
    }

    .snowflake:nth-child(197) span {
        animation: spin 15s linear 0s infinite;
        filter: drop-shadow(0 0 4px #368BC1);
    }

    @keyframes fall-197 {
        3.5% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 30.8vw;
        }
    }

    .snowflake:nth-child(198) {
        opacity: 0.53;
        font-size: 6px;
        left: 115.5vw;
        animation: fall-198 20s -7.5s ease-in infinite;
    }

    .snowflake:nth-child(198) span {
        animation: spin 12s linear 0s infinite;
        filter: drop-shadow(0 0 1px #368BC1);
    }

    @keyframes fall-198 {
        5.1666666667% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 16.8vw;
        }
    }

    .snowflake:nth-child(199) {
        opacity: 0.25;
        font-size: 9px;
        left: 40.6vw;
        animation: fall-199 40s -31.5s ease-in infinite;
    }

    .snowflake:nth-child(199) span {
        animation: spin 9s linear 0s infinite;
        filter: drop-shadow(0 0 3px #368BC1);
    }

    @keyframes fall-199 {
        6.5% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 112.1vw;
        }
    }

    .snowflake:nth-child(200) {
        opacity: 0.52;
        font-size: 6px;
        left: 119.9vw;
        animation: fall-200 40s -21s ease-in infinite;
    }

    .snowflake:nth-child(200) span {
        animation: spin 6s linear 0s infinite;
        filter: drop-shadow(0 0 4px #368BC1);
    }

    @keyframes fall-200 {
        5.3333333333% {
            transform: rotate(90deg) translateX(0);
        }

        to {
            transform: rotate(90deg) translateX(calc(100vh + 5vmin));
            left: 113.7vw;
        }
    }

    .snowflake span {
        display: block;
        color: #368BC1;
    }

    .snowflake span:before {
        content: "❄";
    }

    .snowflake:nth-child(4n+2) span:before {
        content: "❅";
    }

    .snowflake:nth-child(4n+3) span:before {
        content: "❇";
    }

    .snowflake:nth-child(4n+4) span:before {
        content: "❋";
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>

<div class="snow">
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
    <div class="snowflake"> <span></span></div>
</div>
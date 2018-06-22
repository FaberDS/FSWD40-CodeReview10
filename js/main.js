    //Check rating and return the right stars ----------------------------------------------------------------------------------------
    function starCalc(rating){
        stars = "";
        switch (rating){
                case 1:
                    stars = "&#x2605 &#x2606 &#x2606 &#x2606 &#x2606"
                    return stars;
                    break;
                case 2:
                    stars = "&#x2605 &#x2605 &#x2606 &#x2606 &#x2606"
                    return stars;
                    break;
                case 3:
                    stars = "&#x2605 &#x2605 &#x2605 &#x2606 &#x2606"
                    return stars;
                    break;
                case 4:
                    stars = "&#x2605 &#x2605 &#x2605 &#x2605 &#x2606"
                    return stars;
                    break;
                case 5:
                    stars = "&#x2605 &#x2605 &#x2605 &#x2605 &#x2605"
                    return stars;
                    break;
                default:
                    stars = "&#x2606 &#x2606 &#x2606 &#x2606 &#x2606"
                    return stars;
                    break;
                    
            }

    }
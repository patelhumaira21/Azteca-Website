/**
 * This function checks if the field is empty or null.
 */
var isEmpty = function(value){
    return (value=="" || value==null);
};


/**
 * This function checks if cost or retail is of correct format.
 */
var checkCurrencyFormat =function(currency){
    var regex_currency = new RegExp("^[0-9]*(\.[0-9]{2})?$");
    return regex_currency.test(currency);
}

/**
 * This function checks if cost or retail is of correct format.
 * Regex Source emailregex.com
 */
function checkEmailFormat(email) {
    var re = new RegExp(/^[a-z0-9!#$%&*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+(?:[A-Z]{2}|com|org|net|gov|mil|biz|info|mobi|name|aero|jobs|museum|edu)\b$/);
    return re.test(email);
}

/**
 * This function checks if the field is valid.
 */
var isValidField = function(value,field){

    if(field=="price") {
        // check if cost or retail value is empty.
        if(isEmpty(value)){
            return {valid:false , msg:"Enter "+field};
        }
        else{
            // check the format of the value in cost or retail.
            return (!checkCurrencyFormat(value))
                ? {valid:false , msg:"Enter a value only up to 2 decimal places for "+field}
                :{valid:true , msg:"success"};
        }
     }
    else{
        return (isEmpty(value))
             ? {valid:false , msg:"Enter "+field}
             :{valid:true , msg:"success"};
    }
};
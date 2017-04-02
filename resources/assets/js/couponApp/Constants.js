/**
 * Created by usamaahmed on 8/10/16.
 */

export const initialState = {
    coupon: {
        id: '',
        value: '',
        is_percentage : false,
        customer_id: '',
        active: '',
        status: '',
        code: '',
        minimum_charge: '',
        due_date: '',
    }
};

export const appURL = 'http://meemonoon.com/app/api/';
export const couponURL = 'http://meemonoon.com/api/coupon/';
export const messageSuccess = 'thank you .. your coupon has been successfully added to your order .. please proceed to checkout page';
export const messageError = 'coupon you entered may be not correct or not active .. please try again';
export const messageOrderValidate = 'the minimum charges for such coupon must exceed the order\'s grand total';
export const Accept = 'application/json';
export const grandTotal = document.getElementById('grandTotal').innerText;
export const api_token = document.getElementById('api_token').innerText;
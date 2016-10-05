/**
 * Created by usamaahmed on 8/10/16.
 */
import * as actions from '../actions/types';
import { couponURL , Accept , api_token } from '../../Constants';

const couponActions = {

    getFetchCoupon: function (code, grandTotal) {
        return (disptach) => {
            return fetch(couponURL + code, {
                method: 'POST',
                body: JSON.stringify({
                    code: code
                }),
                headers: new Headers({
                    'Accept': Accept,
                    'Authorization': 'Bearer '+ api_token,
                    'Content-Type': Accept
                })
            })
                .then((response) => response.json())
                .then((json) => disptach(couponActions.validateOrder(json, grandTotal)))
                .catch((e) => (console.log(e)));
        }
    },

    validateOrder: function (coupon, grandTotal) {
        return (dispatch) => {
            (coupon.result === 0) ?
                dispatch(couponActions.orderError(coupon.result))
                :
                (grandTotal >= coupon.minimum_charge) ?
                    dispatch(couponActions.getCoupon(coupon))
                    :
                    dispatch(couponActions.orderError('orderError'));
        }
    },

    orderError: function (id) {
        return {
            type: actions.ORDER_ERROR,
            id: id
        }
    },

    getCoupon: function (coupon) {
        return {
            type: actions.GET_COUPON,
            coupon
        }
    },

    postCoupon: function (coupon) {
        return {
            type: actions.POST_COUPON,
            id: coupon.id,
            consumed: coupon.consumed
        }
    }
}
export default couponActions;


//value
//customer_id
//active
//status
//code
//minimum_total_price
//due_date
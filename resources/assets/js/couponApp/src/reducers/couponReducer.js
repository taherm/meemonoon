/**
 * Created by usamaahmed on 8/10/16.
 */
import * as actions from '../actions/types';

let couponReducer = function (coupon = {}, action) {
    switch (action.type) {
        case actions.GET_COUPON:
            if (action.coupon.result === 0) {
                return Object.assign({}, {
                    id: action.coupon.result
                });
            } else {
                return Object.assign({}, action.coupon);
            }
        case actions.ORDER_ERROR :
            return Object.assign({}, {
                id: action.id
            })
        default :
            return coupon;
    }
}
export default couponReducer;
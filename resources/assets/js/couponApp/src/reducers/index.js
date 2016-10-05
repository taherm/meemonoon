/**
 * Created by usamaahmed on 8/10/16.
 */
import { combineReducers } from 'redux';
import couponReducer from '../reducers/couponReducer';

let rootReducer = combineReducers({
    coupon : couponReducer
});

export default rootReducer;
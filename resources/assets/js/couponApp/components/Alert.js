/**
 * Created by usamaahmed on 8/11/16.
 */
import React , { Component } from 'react';
import AlertMessageError from '../components/AlertMessageError'
import AlertMessageSuccess from '../components/AlertMessageSuccess'
import * as messages from '../Constants';


export default class Alert extends Component {

    constructor(props, content) {
        super(props, content);
    }

    getAlert(coupon,couponFinalVal) {

        if (coupon.id === 0) {

            return <AlertMessageError message={messages.messageError}/>

        } else if (coupon.id === 'orderError') {

            return <AlertMessageError message={messages.messageOrderValidate}/>

        } else {

            return <AlertMessageSuccess message={messages.messageSuccess} couponValue={couponFinalVal}/>

        }
    }

    render() {
        return (
            <div className={(this.props.coupon.id === '') ? 'hidden' : 'row'}>
                <div className="row col-lg-8 col-lg-push-2">
                    {
                        this.getAlert(this.props.coupon,this.props.couponFinalVal)
                    }
                </div>
            </div>
        );
    }

}
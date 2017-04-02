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

    getAlert(coupon) {

        if (coupon.id === 0) {

            return <AlertMessageError message={messages.messageError}/>

        } else if (coupon.id === 'orderError') {

            return <AlertMessageError message={messages.messageOrderValidate}/>

        } else {

            return <AlertMessageSuccess message={messages.messageSuccess} couponValue={coupon.value} percentage={coupon.percentage}/>

        }
    }

    render() {
        return (
            <div className={(this.props.coupon.id === '') ? 'hidden' : 'row'}>
                <div className="row col-lg-8 col-lg-push-2">
                    {
                        this.getAlert(this.props)
                    }
                </div>
            </div>
        );
    }

}
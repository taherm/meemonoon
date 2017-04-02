/**
 * Created by usamaahmed on 8/11/16.
 */
import React , { Component } from 'react';


export default class AlertMessageSuccess extends Component {

    constructor(props, content) {
        super(props, content);
    }

    render() {
        return (
            <div className="alert alert-success alert-dismissible" role="alert">
                <strong>Success !! congratulations .. you received Discount :  {this.props.couponValue} { this.props.percentage ? '%' : null } </strong>
                <span className="glyphicon glyphicon-ok" aria-hidden="true"></span>
                 {this.props.message}
            </div>
        );
    }

}
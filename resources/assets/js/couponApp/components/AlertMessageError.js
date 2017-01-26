/**
 * Created by usamaahmed on 8/11/16.
 */
import React , { Component } from 'react';


export default class AlertMessageError extends Component {

    constructor(props, content) {
        super(props, content);
    }

    render() {
        return (
            <div className="alert alert-danger alert-dismissible" role="alert">
                <span className="glyphicon glyphicon-remove" aria-hidden="true"></span>
                <strong>Error !</strong>
                {this.props.message}
            </div>
        );
    }

}
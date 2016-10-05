import React , { Component } from 'react';
import { connect } from 'react-redux';
import { bindActionCreators } from 'redux';
import couponActions from '../../js/couponApp/src/actions/couponActions';
import Alert from '../../js/couponApp/components/Alert';
import { couponURL , grandTotal , access_token } from '../../js/couponApp/Constants'


class App extends Component {

    constructor(props, content) {
        super(props, content);
        this.state = ({code: null, couponValue : ''});
    }

    handleChange(e) {
        this.setState({code: e.target.value});
    }


    handleSubmit(e) {
        e.preventDefault();
        this.props.couponActions.getFetchCoupon(this.state.code, grandTotal).then( () => {
            this.setState({ couponValue : this.props.coupon.value });
        });
    }

    render() {
        return (
            <div className="row">
                <div id="couponValue" className="hidden">{this.state.couponValue}</div>
                <Alert coupon={this.props.coupon} />
                <form method="POST" action={couponURL} className="form-virtical"
                      onSubmit={this.handleSubmit.bind(this)}>
                    <div className="flatrate">
                        <p><input onChange={this.handleChange.bind(this)} type="text" required min="5"
                                  name="coupon"/><label>please enter the
                            number for your coupon</label></p>
                    </div>
                    <button type="submit" className="col-lg-6 col-lg-push-3 btn custom-button">apply
                        coupon
                    </button>
                </form>
            </div>
        );
    }

}

function mapStateToProps(state) {
    return state;
}

function mapDispatchToProps(dispatch) {
    return {
        couponActions: bindActionCreators(couponActions, dispatch)
    }
}


export default connect(mapStateToProps, mapDispatchToProps)(App);
import React from 'react';

export default class Lending extends React.Component{

    constructor(props){
        super(props);
    }

    render(){
        let student_HTMLTABLE = this.props.location.state.data.map( (item, index) => {
            return (
                <tr className="text-center" key={index}>
                    <td>{item.bank_name}</td>
                    <td>{item.interest_rate}</td>
                    <td>{item.monthly_payments}</td>
                    <td>{item.overpayment_amount}</td>
                </tr>
            );
        });

        return (
            <div>
                <div className="container">
                    <div className="row">
                        <div className="col-md-12">
                            <div className="card">
                                <div className="card-header">
                                    <h4>Доступные банки</h4>
                                </div>
                                <div className="card-body">

                                    <table className="table table-bordered table-striped">
                                        <thead>
                                        <tr className="text-center">
                                            <th>Банк</th>
                                            <th>Годовая процентная ставка</th>
                                            <th>Ежемесячные выплаты</th>
                                            <th>Сумма переплаты</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            {student_HTMLTABLE}
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}
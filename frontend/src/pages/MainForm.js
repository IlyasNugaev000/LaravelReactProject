import React, {useState} from 'react';
import Select from 'react-select'
import {useHistory} from 'react-router-dom';

import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap/dist/js/bootstrap.js';
import Form from 'react-bootstrap/Form';
import Button from 'react-bootstrap/Button';
import ButtonToolbar from 'react-bootstrap/ButtonToolbar';
import InputGroup from 'react-bootstrap/InputGroup';

import axios from 'axios';
axios.defaults.baseURL = "http://localhost:8086/api/";

export default function MainForm() {

    let history = useHistory();

    const [formInput, setForm] = useState({
        firstname: '',
        surname: '',
        patronymic: '',
        birthday: '',
        employment: false,
        amount: '',
        period: '',
        citizen: false,
        phone: '',
        email: '',
        error_list: [],
    });

    const [currentSelectValue, setCurrentSelectValue] = useState('year');

    const getValue = () => {
        return currentSelectValue ? options.find(c => c.value === currentSelectValue) : '';
    }

    const onChange = (newValue) => {
        setCurrentSelectValue(newValue.value);
    }

    const options = [
        {
            'value': 'month',
            'label': 'Месяц'
        },
        {
            'value': 'year',
            'label': 'Год'
        }
    ];

    const date = new Date();
    const year = date.getFullYear();
    const month = date.getMonth() + 1;
    const day = date.getDate();

    const currentDate = `${year}-${month<10?`0${month}`:`${month}`}-${day<10?`0${day}`:`${day}`}`;

    const handleInput = (e) => {
        e.persist();
        setForm({...formInput, [e.target.name]: e.target.value })
    }

    const handleCheckbox = (e) => {
        if (e.target.checked) {
            setForm({...formInput, [e.target.name]: true })
        } else {
            setForm({...formInput, [e.target.name]: false })
        }
    }

    const submitForm = (e) => {
        e.preventDefault();

        const data = {
            firstname:formInput.firstname,
            surname:formInput.surname,
            patronymic:formInput.patronymic,
            birthday:formInput.birthday,
            employment:formInput.employment,
            amount:Number(formInput.amount),
            period: (currentSelectValue === 'year') ? Number(formInput.period) * 12 : Number(formInput.period),
            citizen:formInput.citizen,
            phone:formInput.phone,
            email:formInput.email,
        }

        axios.post(`/api/lending`, data).then(res => {
            if(res.status === 200)
            {
                history.push({
                    pathname: '/lending',
                    state: res.data
                });
            }
        }).catch(err => {
            if (err.response.status === 422) {
                console.log(err.response.data.message);
            }
        });
    }

    return (
        <ButtonToolbar style={{ display: 'block',
            width: 700,
            padding: 30 }}>
            <h4>Заполните форму ниже, чтобы узнать в каком банке вы можете получить кредит</h4>
            <Form onSubmit={submitForm}>
                <Form.Group className="mb-3">
                    <Form.Label>Введите фамилию:</Form.Label>
                    <Form.Control type="text"
                                  name="surname"
                                  placeholder="Введите фамилию"
                                  onChange={handleInput}
                                  required />
                </Form.Group>
                <Form.Group className="mb-3">
                    <Form.Label>Введите имя:</Form.Label>
                    <Form.Control type="text"
                                  name="firstname"
                                  placeholder="Введите имя"
                                  onChange={handleInput}
                                  required />
                </Form.Group>
                <Form.Group className="mb-3">
                    <Form.Label>Введите отчество:</Form.Label>
                    <Form.Control type="text"
                                  name="patronymic"
                                  placeholder="Введите отчество"
                                  onChange={handleInput}
                                  required />
                </Form.Group>
                <Form.Group className="mb-3">
                    <Form.Label>Введите дату рождения:</Form.Label>
                    <Form.Control type="date"
                                  max={currentDate}
                                  name="birthday"
                                  placeholder="01-07-2000"
                                  onChange={handleInput}
                                  required />
                </Form.Group>
                <Form.Group className="mb-3">
                    <Form.Check type="checkbox"
                                name="employment"
                                label="Трудоустроен официально"
                                onChange={handleCheckbox} />
                </Form.Group>
                <Form.Group className="mb-3">
                    <Form.Label>Сумма кредита:</Form.Label>
                    <Form.Control type="number"
                                  min="1"
                                  name="amount"
                                  placeholder="Сумма кредита"
                                  onChange={handleInput}
                                  required />
                </Form.Group>
                <Form.Group className="mb-3" required>
                    <Form.Label>Срок кредитования:</Form.Label>
                    <ButtonToolbar className="mb-3" aria-label="Toolbar with Button groups">
                        <InputGroup>
                            <Form.Control
                                type="number"
                                min="1"
                                name="period"
                                placeholder="Срок кредитования"
                                onChange={handleInput}
                                required />
                        </InputGroup>
                        <Select onChange={onChange} value={getValue()} options={options}>
                        </Select>
                    </ButtonToolbar>
                </Form.Group>
                <Form.Group className="mb-3">
                    <Form.Check type="checkbox"
                                name="citizen"
                                label="Гражданин РФ"
                                onChange={handleCheckbox} />
                </Form.Group>
                <Form.Group className="mb-3">
                    <Form.Label>Номер телефона:</Form.Label>
                    <Form.Control type="tel"
                                  name="phone"
                                  pattern="\+7\s?[\(]{0,1}9[0-9]{2}[\)]{0,1}\s?\d{3}[-]{0,1}\d{2}[-]{0,1}\d{2}"
                                  placeholder="+7(___)___-__-__"
                                  onChange={handleInput}
                                  required />
                </Form.Group>
                <Form.Group className="mb-3">
                    <Form.Label>Введите почту:</Form.Label>
                    <Form.Control type="email"
                                  name="email"
                                  placeholder="Введите почту"
                                  onChange={handleInput}
                                  required />
                </Form.Group>
                <Form.Group className="mb-3">
                    <Form.Check type="checkbox"
                                name="agreement"
                                value="agreement"
                                label="Согласен на обработку персональных данных"
                                onChange={handleInput}
                                required />
                </Form.Group>
                <Button variant="primary" type="submit">
                    Отправить
                </Button>
            </Form>
        </ButtonToolbar>
    );
}
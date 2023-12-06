/* eslint-disable react/prop-types */
import { useState } from "react";
import './style.css';
const DropDown = (props) =>{
    const [isActive, setIsActive] = useState(false);
    const toggleDropDown = () => {
        setIsActive(!isActive);
    };

    return (
        <div className="dropdown">
            <button onClick={toggleDropDown} className="dropbtn">{props.name}</button>
            <div id="myDropdown" className={isActive==true ? 'show flex box' : 'dropdown-content'}>
            <span className="clickable">Doctor</span>
            <span  className="clickable">Patient</span>
            </div>
        </div>
    )
}

export default DropDown;
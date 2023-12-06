/* eslint-disable react/no-unescaped-entities */
import { useState } from "react";
import { sendRequest } from "../../core/helpers/request";
import { useNavigate } from "react-router-dom";
import image from "../../assets/images/logo-hospital.png";

// eslint-disable-next-line react/prop-types
const AdminAuthPage = () => {
  const navigate = useNavigate();

  const [form, setForm] = useState({
    email: "",
    password: "",
  });

  const handleForm = (field, value) => {
    setForm((prev) => {
      return {
        ...prev,
        [field]: value,
      };
    });
  };

  const handleSubmit = async () => {
    const response = await sendRequest({
      body: form,
      route: "/admin/signin",
      method: "POST",

    });

    console.log(response.status);
    if (response.status === "logged in") {
      // save the login status in redux
    //   localStorage.setItem("logged_in", true);
      navigate("/landing");
    }
  };

  return (
    <div className="flex column center authBox">
        <img src={image} className="logo-image" alt="" />
        <input
            type="text"
            name="email"
            onChange={(e) => handleForm("email", e.target.value)}
        />
        <input
            type="text"
            name="password"
            onChange={(e) => handleForm("password", e.target.value)}
        />

        <button className="primary-bg white-text" onClick={() => handleSubmit()}>
            Login
        </button>
    </div>
  );
};

export default AdminAuthPage;


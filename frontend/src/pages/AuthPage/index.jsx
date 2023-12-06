import { useState } from "react";
import "./style.css";
import LoginForm from "./forms/LoginForm";
import RegisterForm from "./forms/RegisterForm";

const AuthPage = () => {
  const [isLogin, setIsLogin] = useState(false);

  const switchHandler = () => {
    setIsLogin(!isLogin);
  };

  return (
    <div className="page flex column center">
      {isLogin == false? (
        <LoginForm switchToRegister={switchHandler} />
      ) : (
        <RegisterForm switchToLogin={switchHandler} />
      )}
    </div>
  );
};

export default AuthPage;

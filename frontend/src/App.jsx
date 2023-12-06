import { BrowserRouter, Routes, Route } from "react-router-dom";
import AuthPage from "./pages/AuthPage";
import LandingPage from "./pages/LandingPage";
import AdminAuthPage from "./pages/AdminAuthPage";

const App = () => {
  return (
    <div className="App">
      <BrowserRouter>
        <Routes>
          <Route path="/admin" element={<AdminAuthPage/>}/>
          <Route path="/auth" element={<AuthPage />} />
          <Route path="/landing" element={<LandingPage />} />
        </Routes>
      </BrowserRouter>
    </div>
  );
};

export default App;

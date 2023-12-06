// import { useEffect, useState } from "react";
// import { sendRequest } from "../../core/helpers/request";
const LandingPage = () => {
    return (
        <div>Hello</div>
    )
}
export default LandingPage;
// const LandingPage = () => {
//   const [restos, setRestos] = useState([]);
//   const [loading, setLoading] = useState(false);
//   const [error, setError] = useState("");

//   useEffect(() => {
//     setLoading(true);

//     sendRequest({
//       route: "/getrestaurants",
//     })
//       .then((res) => {
//         console.log(res);

//         setLoading(false);
//         setRestos(res);
//       })
//       .catch((error) => {
//         setLoading(false);
//         setError(error.message);
//       });
//   }, []);

//   return (
//     <div className="page flex row center">
//       {loading ? (
//         <p>Loading</p>
//       ) : error !== "" ? (
//         <p>{error}</p>
//       ) : restos.length === 0 ? (
//         <p>No restos</p>
//       ) : (
//         restos.map((resto) => (
//           <div key={resto.restaurant_name}>
//             <p>{resto.restaurant_name}</p>
//             <p>{resto.restaurant_description}</p>
//           </div>
//         ))
//       )}
//     </div>
//   );
// };

// export default LandingPage;

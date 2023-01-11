// -------------------function component --------------------- //
import React from 'react';
import './App.css';
import DIs from './components/DIs';
import Table from './components/Table';
import Login from './components/Login'
import { Container } from 'react-bootstrap';

function App() {
  return (
    //---- react fragment tag is used for preventing unwanted node 
 
    <div className="App">
        <h1>HEllo class</h1>
        <p>checking the text display on ui browser</p>
        <center>
          <Container>
          <Login name="sushmitha" num="123"/>
          </Container>
         
        </center>

        <h4>Table display</h4>
        <Table />
    </div>
   
  );
}

export default App;

// // ------------- class compnent ----------------- //
// import React, { Component } from 'react'
// import DIs from './components/DIs'

// export default class App extends Component {
 
//   state ={
//     name : "xyz",
//     pet:"cat",
//     products : []
//   }
//   componentDidMount(){
//     fetch("https://jsonplaceholder.typicode.com/todos").then(
//       res => res.json()
//       ).then(data => this.setState({products:data})).catch(err => console.log(err))
    
//   }
//   render() {
//     return (
//       <div>
//         <center>
//           <h1> class component</h1>
//           <p>{this.state.name}</p><br />
//           <button onClick={ () => this.setState({name:"varsha"})}> new name </button>
//           <br />
//           <h2><DIs data={this.state.pet} /></h2>
//           <p>below used data</p>
//           <p>{this.state.products.map((products) =><li key={products.id}>{products.id}{products.title}</li>)}</p>
        
//         </center>
//         </div>
//     )
//   }
// }

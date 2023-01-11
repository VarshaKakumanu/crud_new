//-----------Class child component ---------------- //


// import React, { Component } from 'react'

// export default class DIs extends Component {
//   render() {
//     return (
//       <div>Welcome {this.props.data}</div>
//     )
//   }
// }


//------------ functional child component -------------

import React from 'react'

const DIs = () => {
  return (
    <React.Fragment>
      <section>
        <div>
            <h1>
                Main Heading
            </h1>
        </div>
      </section>
    </React.Fragment>
  )
}

export default DIs

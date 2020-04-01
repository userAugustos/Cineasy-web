import React, { useState } from 'react'
import { Navbar, Nav, Button, Container, Image } from "react-bootstrap";

import Logo from "../../assets/logo.png";

import { Section } from './Style'

export default function Home() {

  window.onscroll = () => {
    window.pageYOffset === 15 ? document.getElementById('navMenu') : console.log();
  }

  return (
    <>
      <Navbar expand="md">
        <Container fluid>
          <Navbar.Brand href="/">
            <Image
              src={Logo}
              height="80px"
            />
          </Navbar.Brand>
          <Navbar.Toggle aria-controls="menuMobile" />
          <Navbar.Collapse id="menuMobile" className="justify-content-end">
            <Nav className="floa">
              <Nav.Link href="/">Home</Nav.Link>
              <Nav.Link href="/novidades">Novidades</Nav.Link>
              <Button variant="dark">Login</Button>
            </Nav>
          </Navbar.Collapse>
        </Container>
      </Navbar>
      <Container>
        <Section></Section>
      </Container>
    </>
  )
}


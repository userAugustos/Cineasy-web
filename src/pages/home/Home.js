
import React from 'react'

import { Navbar, Nav, Button, Container, Image } from "react-bootstrap";
import AOS from 'aos';
import {  FaGooglePlay, FaApple } from 'react-icons/fa';

import Menu from "../../Components/menu/Menu.js";

import {
     Content, DivDash, BtnContent, Section
} from './Style.js';

import CellImage from '../../assets/CelularCine.png';

export default function Home() {

  window.onscroll = () => {
    window.pageYOffset === 15 ? document.getElementById('navMenu') : console.log();
  }

  return (
    <>

        <Menu />

        <Content>

          <DivDash>
            <h3>Descontos exclusivos integrados na plataforma</h3>
            <p>Com o App da Cineasy você tem acesso a comunidades exclusivas do mundo do cinema, a ingressos de cinema, combos e mimos, Além de descontos progressivos em ingressos.</p>
            <p> Eai, tá esperando o que para baixar e virar assinante? </p>
            <BtnContent>
              <button> <FaGooglePlay color="#FFF" size={20} /> Android</button>
              <button> <FaApple color="#FFF" size={20}/> Apple</button>
            </BtnContent>
          </DivDash>
          
            <img src={CellImage} alt=""/>

        </Content>

      <Container>
        <Section></Section>
      </Container>
    </>
  )
}

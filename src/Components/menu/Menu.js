import React, { Compoenent, useState, useRef, useEffect } from 'react';
import Logo from "../../assets/logo.png";

import { 
  HeaderContainer, Collapse, ShowUser, Nav, IconDiv, ToggleButton 
  } from './Style.js';
import {
 FaBars, FaHome, FaTicketAlt, FaNewspaper, FaCreditCard, FaFilm
  } from 'react-icons/fa';


  export default function Menu(){

  const [navBackground, setNavBackground] = useState(false);

    const navRef = useRef();

  navRef.current = navBackground;

  useEffect(() => {
    const handleScroll = () => {
      const show = window.scrollY > 120
      if (navRef.current !== show) {
        setNavBackground(show)

        console.log(navRef.current);
      }
    }
    document.addEventListener('scroll', handleScroll)
    return () => {
      document.removeEventListener('scroll', handleScroll)
    }
  }, [])

    console.log(navBackground);

  const [openMenu, setOpenMenu] = useState(false);

  const toggle = () => {
    setOpenMenu(!openMenu);
  };

      function IsLogged(props) {

        const isLoggedIn = props.isLoggedIn;

        function TypeUser({UserInfo}) {

            const CompORUser = UserInfo.lvlUser;

            console.log(CompORUser);

            if (CompORUser === 1) {

                return (

                <>
                  <div>
                    <ul>
                      <li> <FaHome size={20}/> <a href="/"> Home </a> </li>
                      <li> <FaTicketAlt size={20}/> <a href="/">  Redes de cinema </a> </li>
                      <li> <FaNewspaper size={20}/> <a href="/"> Novidades </a> </li>
                    </ul>
                  </div>
                    <ShowUser>
                      <span>{UserInfo.nome}</span>
                      <img src={UserInfo.imageUrl} alt="User"/>
                    </ShowUser>

                </>
              );
          }
            else {

                return (

                  <>

                  <div>
                    <ul>
                      <li> <FaHome size={20}/> <a href="/"> Home </a> </li>
                      <li> <FaCreditCard size={20}/> <a href="/"> Suas Publicações </a> </li>
                      <li> <FaFilm size={20}/> <a href="/">  Seus Filmes </a> </li>
                      <li> <FaNewspaper size={20}/> <a href="/"> Suas comunidades </a> </li>
                    </ul>
                  </div>

                    <ShowUser> 
                      <a href="/"> 
                        <span>{UserInfo.nome}</span>
                        <img src={UserInfo.imageUrl} alt="User"/>
                      </a>
                    </ShowUser>

                  </>
                );
            };
          }

        if (isLoggedIn) { 

          const UserInfo = {
            "id": 1,
            "nome": "Felipe",
            "lvlUser": 2,
            "plan": "free",
            "imageUrl": "https://ih1.redbubble.net/image.24644759.7716/fc,550x550,grass_green.u2.jpg",
          }

          return TypeUser({UserInfo});
        }
        else {

          return (
            <>
              <div>
                <ul>
                  <li> <FaHome size={20}/> <a href="/"> Home </a> </li>
                  <li> <FaTicketAlt size={20}/> <a href="/">  Redes de cinema </a> </li>
                </ul>
              </div>

            </>
          );
        }
      }

  return (

      <HeaderContainer className={navBackground === true ? 'ChangeMenu' : ''}>

        <Nav>

        <IconDiv className={openMenu !== true ? '' : "openDivicon"} >

        <img src={Logo} alt="logo cineasy"/>

        <ToggleButton onClick={toggle}>
            <FaBars color = 'white' />
        </ToggleButton>

        </IconDiv>
         <Collapse className={openMenu !== true ? '' : "open"}>
         <IsLogged isLoggedIn={true} />
        </Collapse>
        </Nav>

      </HeaderContainer>
    );
  };

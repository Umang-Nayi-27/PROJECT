gsap.to("#hl1",{x:-6300 , duration:15 , repeat:-1 , ease:"linear"})


gsap.to("#page1",{scrollTrigger:{trigger:"#page1",start:"top top", end:"bottom 50%" , pin:true, }})

// ----------------------------------------------------------------- PIN PAGES ---------------------------------------------

gsap.to(
    "#page2",{scrollTrigger:{
      trigger:"#page2",
      start:`top top`,
      end:`bottom 50%`,
      pin:true,
      }}
  )

  gsap.to(
    "#page3",{scrollTrigger:{
      trigger:"#page3",
      start:`top top`,
      end:`bottom 50%`,
      pin:true,
      
    }}
  )

  gsap.to(
    "#page4",{scrollTrigger:{
      trigger:"#page4",
      start:`top top`,
      end:`bottom 50%`,
      pin:true,
    }}
  )

  // -------------------------------------------------------------- PAGE 1-------------------------------------------------------

  gsap.set("#qt1",{opacity:0,y:40})
  gsap.to("#qt1 ",{opacity:1, y:0,scrollTrigger:{trigger:"#qt1",start:"top 58%", end:"bottom 50%" ,ease:Power3.easeOut,duration:1,scrub:1}})

  gsap.set("#qt2",{opacity:0,y:40})
  gsap.to("#qt2",{opacity:1, y:0,scrollTrigger:{trigger:"#qt2",start:"top 58%", end:"bottom 50%" ,ease:Power3.easeOut,duration:1,scrub:1}})

  gsap.to("#page1",{opacity:0,scrollTrigger:{trigger:"#page1",start:"bottom 60%",ease:Power3.easeOut, end:"bottom top" ,duration:3,scrub:1}})   // for page1 opacity decrease

  // -------------------------------------------------------------- PAGE 2-------------------------------------------------------

  gsap.set("#p2pic",{opacity:0,y:100})
  gsap.to("#p2pic",{opacity:1, y:0,scrollTrigger:{trigger:"#p2pic",start:"top 80%", end:"top 30%" ,duration:4,scrub:1}})  //page 2 picture comes in

  
  gsap.to("#page2",{opacity:0,scrollTrigger:{trigger:"#page2",start:"bottom 60%",ease:Power3.easeOut, end:"bottom top" ,duration:3,scrub:1}})   // for page1 opacity decrease

  // --------------------------------------------------------------- PAGE 3 ------------------------------------------------------------

    gsap.to("#container31",{x:-1000,duration:15,ease:"linear",repeat:-1,yoyo:true})
    gsap.to("#container32",{x:1000,duration:15,ease:"linear",repeat:-1,yoyo:true})
  
    gsap.set("#container31",{opacity:0,y:100})
    gsap.to("#container31",{opacity:1, y:0,scrollTrigger:{trigger:"#container31",start:"top 90%", end:"top 50%" ,duration:4,scrub:1}})  //page 2 picture comes in

    gsap.set("#container32",{opacity:0,y:100})
    gsap.to("#container32",{opacity:1, y:0,scrollTrigger:{trigger:"#container32",start:"top 100%", end:"top 85%" ,duration:4,scrub:1}})  //page 2 picture comes in

    gsap.to("#page3",{opacity:0,scrollTrigger:{trigger:"#page3",start:"bottom 60%",ease:Power3.easeOut, end:"bottom top" ,duration:3,scrub:1}})   // for page1 opacity decrease

  // -------------------------------------------------------------- PAGE 1-------------------------------------------------------

  gsap.to("#hl1",{x:-6300 , duration:15 , repeat:-1 , ease:"linear"})

  gsap.set("#qt1",{opacity:0,y:30})
  gsap.to("#qt1 ",{opacity:1,y:0,duration:1,scrub:true})

  gsap.set("#qt2",{opacity:0,y:30})
  gsap.to("#qt2",{opacity:1,y:0,duration:1,scrub:true})

  // gsap.set("#page1",{opacity:1})
  // gsap.to("#page1",{opacity:0, scrollTrigger:{trigger:"#page1", start:"center top", end:"bottom top", toggleActions: "play reverse play reverse",duration:1}})

  // -------------------------------------------------------------- PAGE 2-------------------------------------------------------

  gsap.set("#bgp2",{y:200})
  gsap.to("#bgp2",{y:0, scrollTrigger:{trigger:"#bgp2", start:"top 70%", end:"top top",duration:1}})

  // gsap.set("#page2",{opacity:1})
  // gsap.to("#page2",{opacity:0, scrollTrigger:{trigger:"#page2", start:"center top", end:"bottom top", toggleActions: "play reverse play reverse",duration:1}})

  

  // ------------------------------------------------------------- PAGE 3----------------------------------------------------------

  gsap.set("#p3",{y:200})
  gsap.to("#p3",{y:0, scrollTrigger:{trigger:"#p3", start:"top 70%", end:"top top",duration:1}})

  // gsap.set("#page3",{opacity:1})
  // gsap.to("#page3",{opacity:0, scrollTrigger:{trigger:"#page3", start:"center top", end:"bottom top", toggleActions: "play reverse play reverse",duration:1}})


  // --------------------------------------------------------------- PAGE 4 ------------------------------------------------------------

  gsap.set("#bgp4",{y:200})
  gsap.to("#bgp4",{y:0, scrollTrigger:{trigger:"#bgp4", start:"top 70%", end:"top top",duration:1}})

  // gsap.set("#page4",{opacity:1})
  // gsap.to("#page4",{opacity:0, scrollTrigger:{trigger:"#page4", start:"center top", end:"bottom top", toggleActions: "play reverse play reverse",duration:1}})


  // -------------------------------------------------------------page5 ----------------------------------------------------------

  gsap.to("#container51",{x:-1000,duration:40,ease:"linear",repeat:-1,yoyo:true})
    gsap.to("#container52",{x:1000,duration:40,ease:"linear",repeat:-1,yoyo:true})

  //   gsap.set("#page5",{opacity:1})
  // gsap.to("#page5",{opacity:0, scrollTrigger:{trigger:"#page5", start:"center top", end:"bottom top", toggleActions: "play reverse play reverse",duration:1}})

  // -----------------------------------------------------------------------------page 6----------------------------------------------

  // gsap.set("#page6",{opacity:1})
  // gsap.to("#page6",{opacity:0, scrollTrigger:{trigger:"#page6", start:"center top", end:"bottom top", toggleActions: "play reverse play reverse",duration:1}})

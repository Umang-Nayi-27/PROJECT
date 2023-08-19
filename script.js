  // -------------------------------------------------------------- PAGE 1-------------------------------------------------------

  gsap.to("#hl1",{x:-6300 , duration:15 , repeat:-1 , ease:"linear"})

  gsap.set("#qt1",{opacity:0,y:30})
  gsap.to("#qt1 ",{opacity:1,y:0,duration:1,scrub:true})

  gsap.set("#qt2",{opacity:0,y:30})
  gsap.to("#qt2",{opacity:1,y:0,duration:1,scrub:true})

  gsap.set("#page1",{opacity:1})
  gsap.to("#page1",{opacity:0, scrollTrigger:{trigger:"#page1", start:"center top", end:"bottom top", toggleActions: "play reverse play reverse",duration:1}})

  // -------------------------------------------------------------- PAGE 2-------------------------------------------------------

  gsap.set("#bgp2",{y:200})
  gsap.to("#bgp2",{y:0, scrollTrigger:{trigger:"#bgp2", start:"top 70%", end:"top top",duration:1}})

  gsap.set("#page2",{opacity:1})
  gsap.to("#page2",{opacity:0, scrollTrigger:{trigger:"#page2", start:"center top", end:"bottom top", toggleActions: "play reverse play reverse",duration:1}})

  

  // ------------------------------------------------------------- PAGE 3----------------------------------------------------------

  gsap.set("#p3",{y:200})
  gsap.to("#p3",{y:0, scrollTrigger:{trigger:"#p3", start:"top 70%", end:"top top",duration:1}})

  gsap.set("#page3",{opacity:1})
  gsap.to("#page3",{opacity:0, scrollTrigger:{trigger:"#page3", start:"center top", end:"bottom top", toggleActions: "play reverse play reverse",duration:1}})


  // --------------------------------------------------------------- PAGE 4 ------------------------------------------------------------

    gsap.to("#container41",{y:-1000,duration:15,ease:"linear",repeat:-1,yoyo:true})
    gsap.to("#container42",{y:1000,duration:15,ease:"linear",repeat:-1,yoyo:true})

    // gsap.set("#container31>div>img",{opacity:0})
    // gsap.to("#container31>div>img",{opacity:1,scrollTrigger:{trigger:"#container31>div>img",duration:2,start:"top bottom",end:"bottom 90%"}})
  
    gsap.set("#container41",{opacity:0})
  gsap.to("#container41",{opacity:1,scrollTrigger:{trigger:"#container31",start:"top 80%", end:"top 30%" ,duration:2,scrub:1}}) 

  gsap.set("#container42",{opacity:0})
  gsap.to("#container42",{opacity:1,scrollTrigger:{trigger:"#container32",start:"top 80%", end:"top 30%" ,duration:2,scrub:1}}) 

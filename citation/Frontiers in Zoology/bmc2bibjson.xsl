<?xml version='1.0' encoding='utf-8'?>
<xsl:stylesheet version='1.0' xmlns:xsl='http://www.w3.org/1999/XSL/Transform'>

<xsl:output method='text' version='1.0' encoding='utf-8' indent='no'/>

<xsl:template name="escapeQuote">
      <xsl:param name="pText" select="."/>

      <xsl:if test="string-length($pText) >0">
       <xsl:value-of select=
        "substring-before(concat($pText, '&quot;'), '&quot;')"/>

       <xsl:if test="contains($pText, '&quot;')">
        <xsl:text>\"</xsl:text>

        <xsl:call-template name="escapeQuote">
          <xsl:with-param name="pText" select=
          "substring-after($pText, '&quot;')"/>
        </xsl:call-template>
       </xsl:if>
      </xsl:if>
    </xsl:template>


	<xsl:template match="/">
		<xsl:apply-templates select="//refgrp"/>
	</xsl:template>

	<!-- authors -->
	<xsl:template match="//aug">
		<xsl:apply-templates select="au"/>
	</xsl:template>

	<xsl:template match="au">
		<xsl:if test="position() != 1">
			<xsl:text>,</xsl:text>
		</xsl:if>
		
		<xsl:text>&#x0D;{</xsl:text>
			<xsl:text>"firstname":"</xsl:text><xsl:value-of select="fnm"/><xsl:text>",</xsl:text>
			<xsl:text>"lastname":"</xsl:text><xsl:value-of select="snm"/><xsl:text>",</xsl:text>
			<xsl:text>"name":"</xsl:text><xsl:value-of select="fnm"/><xsl:text> </xsl:text><xsl:value-of select="snm"/><xsl:text>"</xsl:text>
		<xsl:text>}</xsl:text>
	</xsl:template>


	<!-- references -->
	<xsl:template match="refgrp">
		<xsl:text>{</xsl:text>
			<xsl:apply-templates select="bibl"/>
		<xsl:text>}</xsl:text>
	</xsl:template>

	<!-- Reference list -->
	<xsl:template match="bibl">
		<xsl:if test="position() != 1">
			<xsl:text>,&#x0D;</xsl:text>
		</xsl:if>

		<xsl:text>"</xsl:text><xsl:value-of select="@id"/><xsl:text>":</xsl:text>
		<xsl:text>{&#x0D;</xsl:text>
		<xsl:text>"id":"</xsl:text><xsl:value-of select="@id"/><xsl:text>"</xsl:text>

		<xsl:text>,&#x0D;"author":[</xsl:text>
			<xsl:apply-templates select="aug[1]"/>
		<xsl:text>&#x0D;]</xsl:text>


		<xsl:text>,&#x0D;"year":"</xsl:text>
			<xsl:value-of select="pubdate"/>
		<xsl:text>"</xsl:text>


				<xsl:choose>
					<xsl:when test="publisher and not(url)">
						<!-- book -->
						<xsl:text>,&#x0D;"type":"book"</xsl:text>

						<xsl:if test="title">
							<xsl:text>,&#x0D;"title":"</xsl:text>

					<xsl:call-template name="escapeQuote">
						<xsl:with-param name="pText" select="title/p"/>
					</xsl:call-template>

							<xsl:text>"</xsl:text>
						</xsl:if>

						<xsl:if test="source">
							<xsl:text>,&#x0D;"title":"</xsl:text>
					<xsl:call-template name="escapeQuote">
						<xsl:with-param name="pText" select="source"/>
					</xsl:call-template>
							<xsl:text>"</xsl:text>
						</xsl:if>

				<xsl:if test="publisher">
					<xsl:text>,&#x0D;"publisher":{</xsl:text>
					<xsl:text>&#x0D;"name":"</xsl:text><xsl:value-of select="publisher"/><xsl:text>"</xsl:text>
					<xsl:text>&#x0D;}</xsl:text>
				</xsl:if>



					</xsl:when>
					<xsl:when test="url and not (publisher)">
						<!-- ? -->				
					</xsl:when>

					<xsl:when test="title and source and volume">
						<!-- article -->
						<xsl:text>,&#x0D;"type":"article"</xsl:text>

						<xsl:text>,&#x0D;"title":"</xsl:text>
					<xsl:call-template name="escapeQuote">
						<xsl:with-param name="pText" select="title/p"/>
					</xsl:call-template>
						<xsl:text>"</xsl:text>

						<xsl:text>,&#x0D;"journal":{</xsl:text>

						<xsl:text>&#x0D;"name":"</xsl:text><xsl:value-of select="source"/><xsl:text>"</xsl:text>

						<!-- details -->
						<xsl:text>,&#x0D;"volume":"</xsl:text><xsl:value-of select="volume"/><xsl:text>"</xsl:text>

				<xsl:if test="fpage">
					<xsl:text>,&#x0D;"pages":"</xsl:text><xsl:value-of select="fpage"/>
					<xsl:if test="lpage">
						<xsl:text>--</xsl:text><xsl:value-of select="lpage"/>
					</xsl:if>
					<xsl:text>"</xsl:text>
				</xsl:if>


						<xsl:text>&#x0D;}</xsl:text>





					</xsl:when>
				</xsl:choose>


				<!-- identifiers -->
				<xsl:text>,&#x0D;"identifier":[</xsl:text>
				<xsl:for-each select="xrefbib/pubidlist/pubid">
					<xsl:if test="position() != 1">
						<xsl:text>,&#x0D;</xsl:text>
					</xsl:if>

					<xsl:choose>
						<xsl:when test="@idtype='pmcid'">
							<xsl:text>{"type":"pmc",</xsl:text>
							<xsl:text>"id":</xsl:text><xsl:value-of select="."/>
							<xsl:text>}</xsl:text>
						</xsl:when>
						<xsl:when test="@idtype='pmpid'">
							<xsl:text>{"type":"pmid",</xsl:text>
							<xsl:text>"id":</xsl:text><xsl:value-of select="."/>
							<xsl:text>}</xsl:text>
						</xsl:when>
						<xsl:when test="@idtype='doi'">
							<xsl:text>{"type":"doi",</xsl:text>
							<xsl:text>"id":"</xsl:text><xsl:value-of select="."/><xsl:text>"</xsl:text>
							<xsl:text>}</xsl:text>
						</xsl:when>
						<xsl:otherwise>
						</xsl:otherwise>
					</xsl:choose>
				</xsl:for-each>
				<xsl:text>]</xsl:text>



			
		<xsl:text>&#x0D;}</xsl:text>
	</xsl:template>


</xsl:stylesheet>